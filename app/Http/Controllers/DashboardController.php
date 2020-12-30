<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // total transaksi
        $totaltransaksi = DB::table('tbl_transaksi')
        ->whereMonth('tanggal_transaksi','=',Carbon::now()->month)->count();
        
        // selesai
        $selesai = DB::table('tbl_transaksi')
        ->where('diantar','sudah')
        ->whereMonth('tanggal_transaksi','=',Carbon::now()->month)->count();

        // belum diantar
        $belumdiantar = DB::table('tbl_transaksi')
        ->where('status_order','sudah_dibayar')
        ->where('diantar','belum')
        ->whereMonth('tanggal_transaksi','=',Carbon::now()->month)->count();

        // belum dibayar
        $belumdibayar = DB::table('tbl_transaksi')
        ->where('status_order','belum_dibayar')
        ->whereMonth('tanggal_transaksi','=',Carbon::now()->month)->count();

        return view('admin/dashboard.index',[
            'totaltransaksi'=>$totaltransaksi,
            'selesai'=>$selesai,
            'belumdiantar'=>$belumdiantar,
            'belumdibayar'=>$belumdibayar
            ]);
    }
}
