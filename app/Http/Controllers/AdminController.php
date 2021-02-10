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

    public function index(Request $request){
    	$data_admin = admin::where('tbl_admin.nama_admin','like',"%{$request->keyword}%")->paginate(5)->onEachSide(0);;
    	return view('admin/admin.index', ['data_admin' => $data_admin]);
    }

    public function create(){
    	return view('admin/admin.create');
    }

    public function prosescreate(Request $request){
        $this->_validation($request);
    	Admin::create([
    	    'nama_admin'=>$request->namauser,
    	    'username'=>$request->username,
    	    'password'=>bcrypt($request->password),
    	    'remember_token'=>\Str::random(40)
    	]);

    	return redirect()->route('admin')->with('store','Berhasil disimpan!');
    }

    public function edit($id){
        $admin = admin::where('id_admin',$id)->first();
    	return view('admin/admin.edit', ['admin' => $admin]);
    }

    public function prosesedit(Request $request,$id){
		$this->_validation($request);
                DB::table('tbl_admin')->where('id_admin', $id)->update([
                    'nama_admin' => $request->namauser,
                    'username' => $request->username,
                    'password' => bcrypt($request->password)
                ]);
        return redirect()->route('admin')->with('store','Berhasil diupdate');
    }

    public function delete($id)
    {
    	admin::where('id_admin',$id)->delete();

        return redirect()->back()->with('message','Data berhasil dihapus');
	}
	
	public function feedback(Request $request)
	{
		$data = DB::table('tbl_feedback')->where('tbl_feedback.isi','like',"%{$request->keyword}%")->paginate(5);
		return view('admin/feedback.index', ['data' => $data]);
	}

	public function feedbackdelete($id)
    {
    	DB::table('tbl_feedback')->where('id_feedback',$id)->delete();

        return redirect()->back()->with('message','Data berhasil dihapus');
	}

	public function delete_all()
	{
		DB::table('tbl_feedback')->delete();

		return redirect()->back()->with('message','Data berhasil dihapus semua');
	}

}
