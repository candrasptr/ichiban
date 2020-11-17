<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
	public function index()
	{
		return view('admin/login.index');
	}

    public function login(Request $request)
    {
    	// dd($request->all());
    	// $data = user::where('email',$request->email)->firstOrFail();
    	// if ($data){
    	// 	if (Hash::check($request->password, $data->password)) {
    	// 		session(['berhasil_login' => true]);
    	// 		return redirect('/dashboard');
    	// 	}
    	// }

    	if (Auth::attempt(['email' => $request->username, 'password' => $request->password])) {
    		return redirect('/dashboard');
    	}
    	return redirect('/login')->with('message','Data atau password salah');
    }

    public function logout(Request $request)
    {
    	// $request->session()->flush();
    	Auth::logout();
    	return redirect('/');
    }
}
