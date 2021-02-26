<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\waiter;
use PDF;

class WaiterController extends Controller
{
    private function _validation(Request $request){
	    $validation = $request->validate([
	        'namawaiter' => 'required|max:100',
            'nohp' => 'required|max:12',
            'email' => 'required|max:50',
            'username' => 'required|max:50',
			'password' => 'required'
	    ],
	    [
	        'namawaiter.required' => 'Harus diisi',
            'namawaiter.max' => 'Jangan lebih dari 100 huruf',
            'nohp.required' => 'Harus diisi',
			'nohp.max' => 'Jangan lebih dari 12 huruf',
	        'email.required' => 'Harus diisi',
            'email.max' => 'Jangan lebih dari 50 huruf',
            'username.required' => 'Harus diisi',
			'username.max' => 'Jangan lebih dari 50 huruf',
			'password.required' => 'Harus diisi'
	    ]);
	}
    public function index(Request $request){
        $data = waiter::where('tbl_waiter.nama_waiter','like',"%{$request->keyword}%")->paginate(5)->onEachSide(0);;
    	return view('admin/waiter.index',(['data' => $data]));
    }

    public function create(){
    	return view('admin/waiter.create');
    }

    public function prosescreate(Request $request){
        $this->_validation($request);
    	waiter::create([
            'nama_waiter' => $request->namawaiter,
            'jenis_kelamin' => $request->jk,
            'alamat' => $request->alamat,
            'no_hp' => $request->nohp,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password)
        ]);
        return redirect()->route('waiter')->with('message','Data berhasil ditambahkan!');
    }

    public function edit($id){
        $data = waiter::where('id_waiter',$id)->first();
    	return view('admin/waiter.edit',(['data' => $data]));
    }

    public function prosesedit(Request $request,$id){
        $this->_validation($request);
        $data = waiter::where('id_waiter',$id)->update([
            'nama_waiter' => $request->namawaiter,
            'jenis_kelamin' => $request->jk,
            'alamat' => $request->alamat,
            'no_hp' => $request->nohp,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password)
        ]);
    	return redirect()->route('waiter')->with('message','Data berhasil diubah!');
    }

    public function delete($id)
    {
    	waiter::where('id_waiter',$id)->delete();

        return redirect()->back()->with('message','Data berhasil dihapus');
    }

    public function waiter()
    {
        $transaksi = DB::table('tbl_transaksi')
            ->join('tbl_pelanggan', function($join){
                $join->on('tbl_transaksi.user_transaksi_id','=','tbl_pelanggan.id_pelanggan');
            })->where('diantar','sudah')
            ->paginate(5);
        return view('waiter/orderan.index2',['transaksi' => $transaksi]);
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
            return view('waiter/orderan.index2',['transaksi' => $transaksi]);
    }

    public function belum()
    {
        $transaksi = DB::table('tbl_transaksi')
            ->join('tbl_pelanggan', function($join){
                $join->on('tbl_transaksi.user_transaksi_id','=','tbl_pelanggan.id_pelanggan');
            })->where('status_order','belum_dibayar')
            ->paginate(5);
        return view('waiter/orderan.belum',['transaksi' => $transaksi]);
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
            return view('waiter/orderan.belum',['transaksi' => $transaksi]);
    }

    public function batal()
    {
        $transaksi = DB::table('tbl_transaksi')
            ->join('tbl_pelanggan', function($join){
                $join->on('tbl_transaksi.user_transaksi_id','=','tbl_pelanggan.id_pelanggan');
            })->where('status_order','batal_dipesan')
            ->paginate(5);
        return view('waiter/orderan.batal',['transaksi' => $transaksi]);
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
            return view('waiter/orderan.batal',['transaksi' => $transaksi]);
    }

    public function belum_diantar()
    {
        $transaksi = DB::table('tbl_transaksi')
            ->join('tbl_pelanggan', function($join){
                $join->on('tbl_transaksi.user_transaksi_id','=','tbl_pelanggan.id_pelanggan');
            })->where('status_order','sudah_dibayar')->where('diantar','belum')
            ->paginate(5);
        return view('waiter/orderan.belumdiantar',['transaksi' => $transaksi]);
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
            return view('waiter/orderan.belumdiantar',['transaksi' => $transaksi]);
    }

    public function selesai($id)
    {
        DB::table('tbl_transaksi')->where('id_transaksi',$id)->update([
            'diantar' => 'sudah'
        ]);
        
        return redirect('/waiter');
    }

    public function batalkan($id)
    {
        DB::table('tbl_transaksi')->where('id_transaksi',$id)->update([
            'status_order' => 'batal_dipesan'
        ]);
        
        return redirect('/waiter_batal');
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
        
        return view('waiter/orderan.detail',['transaksi' => $transaksi, 'order' => $order, 'order2' => $order2]);
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
        
        // return view('waiter/orderan.pdf',['transaksi' => $transaksi, 'order' => $order]);
        $pdf = PDF::loadview('waiter/orderan.pdf',['transaksi' => $transaksi, 'order' => $order,'order2' => $order2]);
    	return $pdf->stream('struk-pdf');
    }

    public function order_delete($id)
    {
        DB::table('tbl_transaksi')->where('order_detail_id',$id)->delete();
        DB::table('tbl_order')->where('order_detail_id',$id)->delete();
        DB::table('tbl_order_detail')->where('id_order_detail',$id)->delete();
        return redirect()->back();
    }
}
