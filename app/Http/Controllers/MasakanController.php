<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasakanController extends Controller
{
    public function index()
    {
    	$data_masakan = DB::table('tbl_masakan')->paginate(2);
    	return view('admin/masakan.index', ['data_masakan' => $data_masakan]);
    }
}
