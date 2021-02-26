<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OwnerController extends Controller
{
    private function _validation(Request $request){
	    $validation = $request->validate([
	        'namauser' => 'required|max:100',
			'username' => 'required|max:50',
			'password' => 'required'
	    ],
	    [
	        'namauser.required' => 'Harus diisi',
	        'namauser.max' => 'Jangan lebih dari 100 huruf',
	        'username.required' => 'Harus diisi',
			'username.max' => 'Jangan lebih dari 50 huruf',
			'password.required' => 'Harus diisi'
	    ]
	);
	}

    public function index()
    {
        $data = DB::table('tbl_owner')->paginate(5);
        return view('admin/owner.index',['data'=>$data]);
    }

    public function edit($id)
    {
        $data = DB::table('tbl_owner')->where('id_owner',$id)->first();
        return view('admin/owner.edit',['data'=>$data]);
    }

    public function prosesedit(Request $request,$id)
    {
        $this->_validation($request);
        $password = $request->password;
        DB::table('tbl_owner')->where('id_owner',$id)->update([
            'nama_owner' => $request->namauser,
            'username' => $request->username,
            'password' =>bcrypt($password)
        ]);
        return redirect('/ownerlist');
    }
}
