<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksi = 'abc';
        $transaksi2 = 'abc';
        return view('admin/transaksi.index', ['transaksi' => $transaksi, 'transaksi2' => $transaksi2]);
    }

    public function cari_order(Request $request)
    {

        $ambil = DB::table('tbl_transaksi')->where('id_transaksi', $request->id)->where('status_order', 'belum_dibayar')->first();
        if ($ambil != '') {
            $order = DB::table('tbl_order')
                ->where('order_detail_id', $ambil->order_detail_id)
                ->join('tbl_masakan', function ($join) {
                    $join->on('tbl_order.masakan_id', '=', 'tbl_masakan.id_masakan');
                })
                ->join('tbl_pelanggan', function ($join) {
                    $join->on('tbl_order.user_order_id', '=', 'tbl_pelanggan.id_pelanggan');
                })
                ->get();
            return view('admin/transaksi.index', ['transaksi' => $order, 'transaksi2' => $ambil]);
        } else {
            return redirect()->back()->with('message', 'Data tidak ditemukan');
        }
    }

    public function order_bayar(Request $request, $id)
    {

        $order = DB::table('tbl_order')->where('order_detail_id', $id)
            ->join('tbl_masakan', function ($join) {
                $join->on('tbl_order.masakan_id', '=', 'tbl_masakan.id_masakan');
            })
            ->join('tbl_pelanggan', function ($join) {
                $join->on('tbl_order.user_order_id', '=', 'tbl_pelanggan.id_pelanggan');
            })
            ->get();

        $jumlah_pembayaran = $request->jumlah_pembayaran;
        $total_harga = $order->sum('sub_total');
        $kembalian = $request->jumlah_pembayaran - $order->sum('sub_total');

        if ($jumlah_pembayaran >= $total_harga) {
            DB::table('tbl_order')
                ->where('order_detail_id', $id)->update([
                    'status_order2' => 'sudah_dibayar'
                ]);



            DB::table('tbl_transaksi')
                ->where('order_detail_id', $id)->update([
                    'jumlah_pembayaran' => $request->jumlah_pembayaran,
                    'kembalian' => $kembalian,
                    'status_order' => 'sudah_dibayar'
                ]);

            return redirect('/orderan_belum_diantar');
        } else {
            return redirect('/transaksi')->with('message', 'Pembayaran kurang');
        }
    }
}
