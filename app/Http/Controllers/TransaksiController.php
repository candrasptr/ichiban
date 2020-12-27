<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = DB::table('kosong');
        return view('admin/transaksi.index', ['transaksi' => $transaksi]);
    }

    public function cari_order(Request $request)
    {
        $ambil = DB::table('tbl_transaksi')->where('id_transaksi',$request->id)->first();
        $order = DB::table('tbl_order')->where('order_detail_id',$ambil->order_detail_id)
        ->join('tbl_masakan', function($join){
            $join->on('tbl_order.masakan_id','=','tbl_masakan.id_masakan');
        })
        ->join('tbl_pelanggan', function($join){
            $join->on('tbl_order.user_order_id','=','tbl_pelanggan.id_pelanggan');
        })
        ->get();
        return view('admin/transaksi.index', ['transaksi' => $order, 'transaksi2' => $ambil]);
    }

    public function order_bayar(Request $request, $id)
    {
        $order = DB::table('tbl_order')->where('order_detail_id',$id)
        ->join('tbl_masakan', function($join){
            $join->on('tbl_order.masakan_id','=','tbl_masakan.id_masakan');
        })
        ->join('tbl_pelanggan', function($join){
            $join->on('tbl_order.user_order_id','=','tbl_pelanggan.id_pelanggan');
        })
        ->get();

        $kembalian = $request->jumlah_pembayaran-$order->sum('sub_total');

        DB::table('tbl_order')
        ->where('order_detail_id',$id)->update([
            'status_order'=>'sudah_dibayar'
        ]);

        DB::table('tbl_transaksi')
        ->where('order_detail_id',$id)->update([
            'jumlah_pembayaran' => $request->jumlah_pembayaran,
            'kembalian' => $kembalian,
            'status_order' => 'sudah_dibayar'
        ]);

        return redirect('/orderan_belum_diantar');
    }
}
