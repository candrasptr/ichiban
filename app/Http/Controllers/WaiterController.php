<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\waiter;

class WaiterController extends Controller
{
    private function _validation(Request $request){
	    $validation = $request->validate([
	        'namawaiter' => 'required|max:100',
            'nohp' => 'required|max:12',
            'email' => 'required|max:50',
            'username' => 'required|max:50',
			'password' => 'required'
	    ],
	    [
	        'namawaiter.required' => 'Harus diisi',
            'namawaiter.max' => 'Jangan lebih dari 100 huruf',
            'nohp.required' => 'Harus diisi',
			'nohp.max' => 'Jangan lebih dari 12 huruf',
	        'email.required' => 'Harus diisi',
            'email.max' => 'Jangan lebih dari 50 huruf',
            'username.required' => 'Harus diisi',
			'username.max' => 'Jangan lebih dari 50 huruf',
			'password.required' => 'Harus diisi'
	    ]);
	}
    public function index(Request $request){
        $data = waiter::where('tbl_waiter.nama_waiter','like',"%{$request->keyword}%")->paginate(5)->onEachSide(0);;
    	return view('admin/waiter.index',(['data' => $data]));
    }

    public function create(){
    	return view('admin/waiter.create');
    }

    public function prosescreate(Request $request){
        $this->_validation($request);
    	waiter::create([
            'nama_waiter' => $request->namawaiter,
            'jenis_kelamin' => $request->jk,
            'alamat' => $request->alamat,
            'no_hp' => $request->nohp,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password)
        ]);
        return redirect()->route('waiter')->with('message','Data berhasil ditambahkan!');
    }

    public function edit($id){
        $data = waiter::where('id_waiter',$id)->first();
    	return view('admin/waiter.edit',(['data' => $data]));
    }

    public function prosesedit(Request $request,$id){
        $this->_validation($request);
        $data = waiter::where('id_waiter',$id)->update([
            'nama_waiter' => $request->namawaiter,
            'jenis_kelamin' => $request->jk,
            'alamat' => $request->alamat,
            'no_hp' => $request->nohp,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password)
        ]);
    	return redirect()->route('waiter')->with('message','Data berhasil diubah!');
    }

    public function delete($id)
    {
    	waiter::where('id_waiter',$id)->delete();

        return redirect()->back()->with('message','Data berhasil dihapus');
    }
}
