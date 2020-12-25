<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\pelanggan;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PelangganController extends Controller
{
    public function index(Request $request){
        $data = pelanggan::where('tbl_pelanggan.nama_pelanggan','like',"%{$request->keyword}%")->paginate(5)->onEachSide(0);;
        return view('admin/pelanggan.index',(['data' => $data]));
    }

    public function login(Request $request)
    {
        $data = DB::table('tbl_pelanggan');
        $count = $data->count();
        $kode = 'plg'.$count;
    	pelanggan::create([
            'kode' => $kode,
            'nama_pelanggan'=>$request->nama_pelanggan,
            'password'=>bcrypt($request->password),
            'no_meja'=>$request->no_meja,
            'remember_token'=>\Str::random(30)
        ]);
    	$password = 'candra';
    	if (Auth::guard('pelanggan')->attempt(['kode' => $kode, 'nama_pelanggan' => $request->nama_pelanggan, 'password' => $password])) 
    	{
    	    return redirect()->intended('/home');
    	} else {
    		return redirect('/')->with('message','salah');
    	}
    }

    public function logout(Request $request)
    {
        if (Auth::guard('pelanggan')->check()) {
            Auth::guard('pelanggan')->logout();
          } 

      return redirect('/');
    }
}
