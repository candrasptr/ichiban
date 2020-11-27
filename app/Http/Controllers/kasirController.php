<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\kasir;

class kasirController extends Controller
{

    private function _validation(Request $request){
	    $validation = $request->validate([
	        'namakasir' => 'required|max:100',
            'nohp' => 'required|max:12',
            'email' => 'required|max:50',
            'username' => 'required|max:50',
			'password' => 'required'
	    ],
	    [
	        'namakasir.required' => 'Harus diisi',
            'namakasir.max' => 'Jangan lebih dari 100 huruf',
            'nohp.required' => 'Harus diisi',
			'nohp.max' => 'Jangan lebih dari 12 huruf',
	        'email.required' => 'Harus diisi',
            'email.max' => 'Jangan lebih dari 50 huruf',
            'username.required' => 'Harus diisi',
			'username.max' => 'Jangan lebih dari 50 huruf',
			'password.required' => 'Harus diisi'
	    ]);
    }
    
    public function index(Request $request)
    {
        $data = kasir::where('tbl_kasir.nama_kasir','like',"%{$request->keyword}%")->paginate(5)->onEachSide(0);;

        return view('admin/kasir.index',(['data'=>$data]));
    }

    public function create(){
    	return view('admin/kasir.create');
    }

    public function prosescreate(Request $request){
        $this->_validation($request);
        kasir::create([
            'nama_kasir' => $request->namakasir,
            'jenis_kelamin' => $request->jk,
            'alamat' => $request->alamat,
            'no_hp' => $request->nohp,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password)
        ]);
        return redirect()->route('kasir')->with('store','Berhasil disimpan!');
    }

    public function edit($id){
        $data = kasir::where('id_kasir',$id)->first();
    	return view('admin/kasir.edit',(['data'=>$data]));
    }

    public function prosesedit(Request $request,$id){
        $this->_validation($request);
        kasir::where('id_kasir',$id)->update([
            'nama_kasir' => $request->namakasir,
            'jenis_kelamin' => $request->jk,
            'alamat' => $request->alamat,
            'no_hp' => $request->nohp,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password)
        ]);
        return redirect()->route('kasir')->with('store','Berhasil diubah!');
    }

    public function delete($id)
    {
        kasir::where('id_kasir',$id)->delete();

        return redirect()->back()->with('message','Data berhasil dihapus');
    }

}
