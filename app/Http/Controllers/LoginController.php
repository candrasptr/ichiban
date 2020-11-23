<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\admin;
use Auth;
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

    	// if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
    	// 	return redirect('/dashboard');
    	// }
    	// return redirect('/login')->with('message','Data atau password salah');
        // Attempt to log the user in
              // Passwordnya pake bcrypt
            if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) 
            {
              // if successful, then redirect to their intended location
              return redirect()->intended('/dashboard');
            } else {
                return redirect('/login')->with('message','salah');
            }
            
    }

    public function logout(Request $request)
    {
    	// $request->session()->flush();
    	// Auth::logout();
        if (Auth::guard('admin')->check()) {
              Auth::guard('admin')->logout();
            } elseif (Auth::guard('user')->check()) {
              Auth::guard('user')->logout();
            }

    	return redirect('/');
    }
}
