<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderanController extends Controller
{
    public function index()
    {
        $transaksi = DB::table('tbl_transaksi')
            ->join('tbl_pelanggan', function($join){
                $join->on('tbl_transaksi.user_transaksi_id','=','tbl_pelanggan.id_pelanggan');
            })->paginate(5);
        return view('admin/orderan.index',['transaksi' => $transaksi]);
    }
}
