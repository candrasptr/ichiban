<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class OrderanController extends Controller
{
    public function index()
    {
        $transaksi = DB::table('tbl_transaksi')
            ->join('tbl_pelanggan', function($join){
                $join->on('tbl_transaksi.user_transaksi_id','=','tbl_pelanggan.id_pelanggan');
            })->where('diantar','sudah')
            ->paginate(5);
        return view('admin/orderan.index',['transaksi' => $transaksi]);
    }

    public function filter_penjualan(Request $request)
    {
        $transaksi = DB::table('tbl_transaksi')
            ->join('tbl_pelanggan', function($join){
                $join->on('tbl_transaksi.user_transaksi_id','=','tbl_pelanggan.id_pelanggan');
            })
            ->when($request->dari,function ($query) use ($request) {
            $dari = $request->dari;
            $ke = $request->ke;   
                $query
                ->whereBetween('tanggal_transaksi',[$dari,$ke]);
            })->where('diantar','sudah')
            ->paginate($request->limit ?  $request->limit : 10);
            $transaksi->appends($request->only('dari','ke'));
            return view('admin/orderan.index',['transaksi' => $transaksi]);
    }

    public function belum()
    {
        $transaksi = DB::table('tbl_transaksi')
            ->join('tbl_pelanggan', function($join){
                $join->on('tbl_transaksi.user_transaksi_id','=','tbl_pelanggan.id_pelanggan');
            })->where('status_order','belum_dibayar')
            ->paginate(5);
        return view('admin/orderan.belum',['transaksi' => $transaksi]);
    }

    public function filter_penjualan_belum(Request $request)
    {
        $transaksi = DB::table('tbl_transaksi')
            ->join('tbl_pelanggan', function($join){
                $join->on('tbl_transaksi.user_transaksi_id','=','tbl_pelanggan.id_pelanggan');
            })
            ->when($request->dari,function ($query) use ($request) {
            $dari = $request->dari;
            $ke = $request->ke;   
                $query
                ->whereBetween('tanggal_transaksi',[$dari,$ke]);
            })->where('status_order','belum_dibayar')
            ->paginate($request->limit ?  $request->limit : 10);
            $transaksi->appends($request->only('dari','ke'));
            return view('admin/orderan.belum',['transaksi' => $transaksi]);
    }

    public function batal()
    {
        $transaksi = DB::table('tbl_transaksi')
            ->join('tbl_pelanggan', function($join){
                $join->on('tbl_transaksi.user_transaksi_id','=','tbl_pelanggan.id_pelanggan');
            })->where('status_order','batal_dipesan')
            ->paginate(5);
        return view('admin/orderan.batal',['transaksi' => $transaksi]);
    }

    public function filter_penjualan_batal(Request $request)
    {
        $transaksi = DB::table('tbl_transaksi')
            ->join('tbl_pelanggan', function($join){
                $join->on('tbl_transaksi.user_transaksi_id','=','tbl_pelanggan.id_pelanggan');
            })
            ->when($request->dari,function ($query) use ($request) {
            $dari = $request->dari;
            $ke = $request->ke;   
                $query
                ->whereBetween('tanggal_transaksi',[$dari,$ke]);
            })->where('status_order','batal_dipesan')
            ->paginate($request->limit ?  $request->limit : 10);
            $transaksi->appends($request->only('dari','ke'));
            return view('admin/orderan.batal',['transaksi' => $transaksi]);
    }

    public function belum_diantar()
    {
        $transaksi = DB::table('tbl_transaksi')
            ->join('tbl_pelanggan', function($join){
                $join->on('tbl_transaksi.user_transaksi_id','=','tbl_pelanggan.id_pelanggan');
            })->where('status_order','sudah_dibayar')->where('diantar','belum')
            ->paginate(5);
        return view('admin/orderan.belumdiantar',['transaksi' => $transaksi]);
    }

    public function filter_penjualan_belum_diantar(Request $request)
    {
        $transaksi = DB::table('tbl_transaksi')
            ->join('tbl_pelanggan', function($join){
                $join->on('tbl_transaksi.user_transaksi_id','=','tbl_pelanggan.id_pelanggan');
            })
            ->when($request->dari,function ($query) use ($request) {
            $dari = $request->dari;
            $ke = $request->ke;   
                $query
                ->whereBetween('tanggal_transaksi',[$dari,$ke]);
            })->where('status_order','sudah_dibayar')->where('diantar','belum')
            ->paginate($request->limit ?  $request->limit : 10);
            $transaksi->appends($request->only('dari','ke'));
            return view('admin/orderan.belumdiantar',['transaksi' => $transaksi]);
    }

    public function selesai($id)
    {
        DB::table('tbl_transaksi')->where('id_transaksi',$id)->update([
            'diantar' => 'sudah'
        ]);
        
        return redirect('/orderan');
    }

    public function batalkan($id)
    {
        DB::table('tbl_transaksi')->where('id_transaksi',$id)->update([
            'status_order' => 'batal_dipesan'
        ]);
        
        return redirect('/orderan_batal');
    }

    public function order_detail($id)
    {
        $order = DB::table('tbl_order')->where('order_detail_id',$id)
        ->join('tbl_masakan', function($join){
            $join->on('tbl_order.masakan_id','=','tbl_masakan.id_masakan');
        })
        ->join('tbl_pelanggan', function($join){
            $join->on('tbl_order.user_order_id','=','tbl_pelanggan.id_pelanggan');
        })
        ->get();

        $order2 = DB::table('tbl_order')->where('order_detail_id',$id)
        ->join('tbl_masakan', function($join){
            $join->on('tbl_order.masakan_id','=','tbl_masakan.id_masakan');
        })
        ->join('tbl_pelanggan', function($join){
            $join->on('tbl_order.user_order_id','=','tbl_pelanggan.id_pelanggan');
        })
        ->first();

        $transaksi = DB::table('tbl_transaksi')->where('order_detail_id',$id)->first();
        
        return view('admin/orderan.detail',['transaksi' => $transaksi, 'order' => $order, 'order2' => $order2]);
    }

    public function order_struk($id)
    {
        $order = DB::table('tbl_order')->where('order_detail_id',$id)
        ->join('tbl_masakan', function($join){
            $join->on('tbl_order.masakan_id','=','tbl_masakan.id_masakan');
        })
        ->join('tbl_pelanggan', function($join){
            $join->on('tbl_order.user_order_id','=','tbl_pelanggan.id_pelanggan');
        })
        ->get();

        $order2 = DB::table('tbl_order')->where('order_detail_id',$id)
        ->join('tbl_masakan', function($join){
            $join->on('tbl_order.masakan_id','=','tbl_masakan.id_masakan');
        })
        ->join('tbl_pelanggan', function($join){
            $join->on('tbl_order.user_order_id','=','tbl_pelanggan.id_pelanggan');
        })
        ->first();

        $transaksi = DB::table('tbl_transaksi')->where('order_detail_id',$id)->first();
        
        // return view('admin/orderan.pdf',['transaksi' => $transaksi, 'order' => $order]);
        $pdf = PDF::loadview('admin/orderan.pdf',['transaksi' => $transaksi, 'order' => $order,'order2' => $order2]);
    	return $pdf->stream('struk-pdf');
    }

    public function hapus($id)
    {
        DB::table('tbl_order')->where('order_detail_id',$id)->delete();
        DB::table('tbl_order_detail')->where('id_order_detail',$id)->delete();
        DB::table('tbl_transaksi')->where('order_detail_id',$id)->delete();
        return redirect()->back();
    }
}
