<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WaiterController extends Controller
{
    public function index(){
    	return view('admin/waiter.index');
    }

    public function create(){
    	return view('admin/waiter.create');
    }

    public function edit(){
    	return view('admin/waiter.edit');
    }
}
