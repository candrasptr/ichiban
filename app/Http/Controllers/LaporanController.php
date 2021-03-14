<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use Auth;

class LaporanController extends Controller
{
    public function pdf(Request $request)
    {
        $dari = $request->dari;
        $ke = $request->ke;


        $transaksi = DB::table('tbl_transaksi')
            ->join('tbl_order_detail', function ($join) {
                $join->on('tbl_transaksi.order_detail_id', '=', 'tbl_order_detail.id_order_detail');
            })
            ->join('tbl_order', function ($join) {
                $join->on('tbl_order_detail.order_id', '=', 'tbl_order.id_order');
            })
            ->join('tbl_masakan', function ($join) {
                $join->on('tbl_order.masakan_id', '=', 'tbl_masakan.id_masakan');
            })
            ->join('tbl_pelanggan', function ($join) {
                $join->on('tbl_order.user_order_id', '=', 'tbl_pelanggan.id_pelanggan');
            })
            ->when($request->dari, function ($query) use ($request) {
                $dari = $request->dari;
                $ke = $request->ke;
                $query
                    ->whereBetween('tanggal_transaksi', [$dari, $ke]);
            })->where('status_order', 'sudah_dibayar')->paginate($request->limit ?  $request->limit : 10);
        $transaksi->appends($request->only('dari', 'ke'));

        $data = DB::table('tbl_order')->join('tbl_transaksi', function ($join) {
            $join->on('tbl_order.order_detail_id', '=', 'tbl_transaksi.order_detail_id');
        })
            ->join('tbl_masakan', function ($join) {
                $join->on('tbl_order.masakan_id', '=', 'tbl_masakan.id_masakan');
            })
            ->select('nama_masakan', DB::raw('sum(jumlah) as count'))
            ->when($request->dari, function ($query) use ($request) {
                $dari = $request->dari;
                $ke = $request->ke;
                $query
                    ->whereBetween('tanggal_transaksi', [$dari, $ke]);
            })
            ->where('status_order2', 'sudah_dibayar')
            ->groupBy('masakan_id', 'nama_masakan')
            ->get();

        if (Auth::guard('admin')->check()) {
            $petugas = DB::table('tbl_admin')->where('id_admin', Auth::guard('admin')->user()->id_admin)->first();
        } elseif (Auth::guard('kasir')->check()) {
            $petugas = DB::table('tbl_kasir')->where('id_kasir', Auth::guard('kasir')->user()->id_kasir)->first();
        } elseif (Auth::guard('waiter')->check()) {
            $petugas = DB::table('tbl_waiter')->where('id_waiter', Auth::guard('waiter')->user()->id_waiter)->first();
        } elseif (Auth::guard('owner')->check()) {
            $petugas = DB::table('tbl_owner')->where('id_owner', Auth::guard('owner')->user()->id_owner)->first();
        }

        $pdf = PDF::loadview('admin/laporan.pdf', ['data' => $data, 'transaksi' => $transaksi, 'dari' => $dari, 'ke' => $ke, 'petugas' => $petugas]);
        return $pdf->stream('struk-pdf');
    }
}
