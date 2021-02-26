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
         ->join('tbl_order_detail', function($join){
             $join->on('tbl_transaksi.order_detail_id','=','tbl_order_detail.id_order_detail');
         })
         ->join('tbl_order', function($join){
             $join->on('tbl_order_detail.order_id','=','tbl_order.id_order');
         })
         ->join('tbl_masakan', function($join){
             $join->on('tbl_order.masakan_id','=','tbl_masakan.id_masakan');
         })
         ->join('tbl_pelanggan', function($join){
             $join->on('tbl_order.user_order_id','=','tbl_pelanggan.id_pelanggan');
         })
            ->when($request->dari,function ($query) use ($request) {
            $dari = $request->dari;
            $ke = $request->ke;   
                $query
                ->whereBetween('tanggal_transaksi',[$dari,$ke]);
            })->where('status_order','sudah_dibayar')->where('diantar','sudah')->paginate($request->limit ?  $request->limit : 10);
            $transaksi->appends($request->only('dari','ke'));
        
            $petugas = DB::table('tbl_admin')->where('id_admin',Auth::guard('admin')->user()->id_admin )->first();
            
            $pdf = PDF::loadview('admin/laporan.pdf',['transaksi' => $transaksi, 'dari' => $dari, 'ke' => $ke, 'petugas' => $petugas]);
    	    return $pdf->stream('struk-pdf');
    }
}
