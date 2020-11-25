<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class kasirController extends Controller
{
    public function index(){
    	return view('admin/kasir.index');
    }

    public function create(){
    	return view('admin/kasir.create');
    }

    public function edit(){
    	return view('admin/kasir.edit');
    }
}
