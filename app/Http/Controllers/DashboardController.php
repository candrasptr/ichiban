<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\transaksi;

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

        // kasir
        $kasir = DB::table('tbl_kasir')->paginate(3);

        // Waiter
        $waiter = DB::table('tbl_waiter')->paginate(3);

        // Feedback
        $feedback = DB::table('tbl_feedback')->paginate(3);

        // countfeedback
        $countfeedback = DB::table('tbl_feedback')->count();

        $dataorderchrt = transaksi::select(\DB::raw("COUNT(*) as count"))
        ->whereMonth('tanggal_transaksi', Carbon::now()->month)
        ->groupBy(\DB::raw("Day(tanggal_transaksi)"))
        ->pluck('count');

        

        return view('admin/dashboard.index',[
            'totaltransaksi'=>$totaltransaksi,
            'selesai'=>$selesai,
            'belumdiantar'=>$belumdiantar,
            'belumdibayar'=>$belumdibayar,
            'dataorderchrt'=>$dataorderchrt,
            'kasir'=>$kasir,
            'waiter'=>$waiter,
            'feedback'=>$feedback,
            'countfeedback'=>$countfeedback
            ]);
    }
}
