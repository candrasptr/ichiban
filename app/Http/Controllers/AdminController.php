<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\admin;

class AdminController extends Controller
{
	private function _validation(Request $request){
	    $validation = $request->validate([
	        'namauser' => 'required|max:100',
	        'username' => 'required|max:50'
	    ],
	    [
	        'namauser.required' => 'Harus diisi',
	        'namauser.max' => 'Jangan lebih dari 100 huruf',
	        'username.required' => 'Harus diisi',
	        'username.max' => 'Jangan lebih dari 50 huruf'
	    ]
	);
	}

    public function index(){
    	$data_admin = DB::table('tbl_admin')->paginate(10);
    	return view('admin/admin.index', ['data_admin' => $data_admin]);
    }

    public function create(){
    	return view('admin/admin.create');
    }

    public function prosescreate(Request $request){
    	Admin::create([
    	    'nama_admin'=>$request->namauser,
    	    'username'=>$request->username,
    	    'password'=>bcrypt($request->password),
    	    'remember_token'=>\Str::random(40)
    	]);

    	return redirect()->route('admin')->with('store','Berhasil disimpan!');
    }

    public function edit(){
    	return view('admin/admin.edit');
    }

    public function delete($id)
    {
    	admin::where('id_admin',$id)->delete();

        return redirect()->back()->with('message','Data berhasil dihapus');
    }

}
