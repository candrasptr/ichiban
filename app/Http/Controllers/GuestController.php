<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\pelanggan;
use Auth;
use App\Masakan;

class GuestController extends Controller
{
    public function index()
    {
        $makanan = DB::table('tbl_masakan')
        ->where('nama_kategori','makanan')
        ->paginate(5);

        $minuman = DB::table('tbl_masakan')
        ->where('nama_kategori','minuman')
        ->paginate(5);

        $dessert = DB::table('tbl_masakan')
        ->where('nama_kategori','dessert')
        ->paginate(5);

        $order = DB::table('tbl_order')->where('status_order','sedang_dipesan')->where('user_order_id',Auth::guard('pelanggan')->user()->id_pelanggan)
        ->join('tbl_masakan', function($join){
            $join->on('tbl_order.masakan_id','=','tbl_masakan.id_masakan');
        })
        ->join('tbl_pelanggan', function($join){
            $join->on('tbl_order.user_order_id','=','tbl_pelanggan.id_pelanggan');
        })
        ->get();

    	return view('guest.home', ['makanan' => $makanan, 'minuman' => $minuman, 'dessert' => $dessert, 'order' => $order]);
    }

    public function pesan_order(Request $request){
        $ambil = DB::table('tbl_masakan')->where('id_masakan',$request->id_masakan)->first();
        $now = date('Y-m-d');
        $hasil = $ambil->harga * 1;
        DB::table('tbl_order')->insert([
            'masakan_id'=>$request->id_masakan,
            'order_detail_id'=>0,
            'user_order_id'=>Auth::guard('pelanggan')->user()->id_pelanggan,
            'tanggal_order'=>$now,
            'status_order' => 'sedang_dipesan',
            'jumlah' => '1',
            'sub_total'=>$hasil
        ]);
        return redirect()->back()->with('alert','Berhasil menambah order menu');
    }

    public function order_update(Request $request)
    {
        $ambil1 = DB::table('tbl_order')->where('id_order',$request->id_order)->first();
        $ambil2 = DB::table('tbl_masakan')->where('id_masakan',$ambil1->masakan_id)->first();
        $hasil = $ambil2->harga * $request->jumlah;
        DB::table('tbl_order')->where('id_order',$request->id_order)->update([
            'jumlah'=>$request->jumlah,
            'sub_total'=>$hasil
        ]);
        return redirect()->back()->with('alert','Berhasil mengubah jumlah pesan');
    }

    public function order_bayar(Request $request)
    {      

        $ambil = DB::table('tbl_order')->where('user_order_id',Auth::guard('pelanggan')->user()->id_pelanggan)->where('status_order','sedang_dipesan')->get();
        $order = DB::table('tbl_order')->where('id_order', \DB::raw("(select max(`id_order`) from tbl_order)"))->where('user_order_id',Auth::guard('pelanggan')->user()->id_pelanggan)->first();
            
        foreach($ambil as $a)
        {
            DB::table('tbl_order_detail')->insert([
                'id_order_detail' => $order->id_order,
                'order_id' => $a->id_order
            ]);
        }
        $now = date('Y-m-d');
        $transaksi = DB::table('tbl_transaksi')->get();
        $hitung = count($transaksi);
        if($hitung < 1)
        {
            $no = $hitung + 1;
            $kode = "ICHBNRST".$no;
        }
        
        else if($hitung >= 1)
        {
            $no = $hitung + 1;
            $kode = "ICHBNRST".$no;
        }
            DB::table('tbl_transaksi')->insert([
                'id_transaksi'=>$kode,
                'order_detail_id'=>$order->id_order,
                'tanggal_transaksi' => $now,
                'total_bayar' => $request->total_bayar,
                'jumlah_pembayaran' => 0,
                'kembalian' => 0,
                'user_transaksi_id' => Auth::guard('pelanggan')->user()->id_pelanggan,
                'status_order' => 'belum_dibayar',
                'diantar' => 'belum',
            ]);
     
        $ambil = DB::table('tbl_order')->where('user_order_id',Auth::guard('pelanggan')->user()->id_pelanggan)->where('status_order','sedang_dipesan')->update([
            'order_detail_id'=>$order->id_order,
            'status_order'=>'sudah_dipesan'
        ]);
        
        $transaksi = DB::table('tbl_transaksi')->where('order_detail_id',$order->id_order)->first();

        $order = DB::table('tbl_order')->where('order_detail_id',$order->id_order)->where('user_order_id',Auth::guard('pelanggan')->user()->id_pelanggan)
        ->join('tbl_masakan', function($join){
            $join->on('tbl_order.masakan_id','=','tbl_masakan.id_masakan');
        })
        ->join('tbl_pelanggan', function($join){
            $join->on('tbl_order.user_order_id','=','tbl_pelanggan.id_pelanggan');
        })
        ->get();

        return view('guest.struk',['transaksi' => $transaksi, 'order' => $order])->with('alert','Transaksi berhasil');

    }
    
    public function order_batal($id){
        DB::table('tbl_order')
        ->where('user_order_id',Auth::guard('pelanggan')->user()->id_pelanggan)
        ->where('order_detail_id',$id)->update([
            'status_order'=>'batal_dipesan'
        ]);

        DB::table('tbl_transaksi')
        ->where('order_detail_id',$id)->update([
            'status_order' => 'batal_dipesan'
        ]);

        return redirect('/home');
    }

}
