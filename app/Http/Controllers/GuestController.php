<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    	return view('guest.home', ['makanan' => $makanan, 'minuman' => $minuman, 'dessert' => $dessert]);
    }
}
