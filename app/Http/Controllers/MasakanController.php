<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Masakan;
use Image;

class MasakanController extends Controller
{
    private function _validation(Request $request){
	    $validation = $request->validate([
	        'namamasakan' => 'required|max:30',
			'hargamasakan' => 'required|max:11'
	    ],
	    [
	        'namamasakan.required' => 'Harus diisi',
	        'namamasakan.max' => 'Jangan lebih dari 30 huruf',
	        'hargamasakan.required' => 'Harus diisi',
			'hargamasakan.max' => 'Jangan lebih dari 11 digit'
	    ]
	);
    }
    
    public function makanan()
    {
        $data_masakan = DB::table('tbl_masakan')
        ->where('nama_kategori','makanan')
        ->paginate(5);
    	return view('admin/masakan.index', ['data_masakan' => $data_masakan]);
    }

    public function minuman()
    {
        $data_masakan = DB::table('tbl_masakan')
        ->where('nama_kategori','minuman')
        ->paginate(5);
    	return view('admin/masakan.minuman', ['data_masakan' => $data_masakan]);
    }

    public function dessert()
    {
        $data_masakan = DB::table('tbl_masakan')
        ->where('nama_kategori','dessert')
        ->paginate(5);
    	return view('admin/masakan.dessert', ['data_masakan' => $data_masakan]);
    }

    public function create()
    {
        return view('admin/masakan.create');
    }

    public function prosescreate(Request $request)
    {
        $this->_validation($request);
        //lokasi file foto di simpan
        $lokasi_file = public_path('/assets/img/produk');
        
        if(!empty($request->gambar_masakan))
        {
        //Resize Gambar Masakan
        $gambar_masakan = $request->file('gambar_masakan');
        $nama_gambar_masakan = 'produk_'. time() . '.' . $gambar_masakan->getClientOriginalExtension();
        $resize_gambar_masakan = Image::make($gambar_masakan->getRealPath());
        $resize_gambar_masakan->resize(401, 251)->save($lokasi_file . '/' . $nama_gambar_masakan);
        //End resize Gambar Masakan
        
        Masakan::create([
            'gambar_masakan'=>$nama_gambar_masakan,
            'nama_masakan'=>$request->namamasakan,
            'nama_kategori'=>$request->kategori,
            'harga'=>$request->hargamasakan,
            'status'=>'tersedia'
        ]);
        }else{
            Masakan::create([
                'gambar_masakan'=>'nonimage.jpg',
                'nama_masakan'=>$request->namamasakan,
                'nama_kategori'=>$request->kategori,
                'harga'=>$request->hargamasakan,
                'status'=>'tersedia'
            ]); 
        }

        if ($request->kategori == 'makanan') {
            return redirect()->route('masakan.index')->with('message','Berhasil disimpan!');
        } elseif ($request->kategori == 'minuman') {
            return redirect()->route('minuman.index')->with('message','Berhasil disimpan!');
        } {
            return redirect()->route('dessert.index')->with('message','Berhasil disimpan!');
        } 
        
        
    }

    public function edit($id)
    {
        $data = masakan::where('id_masakan',$id)->first();
    	return view('admin/masakan.edit',(['data' => $data]));
    }

    public function prosesedit(Request $request, $id)
    {
        $this->_validation($request);
        //lokasi file foto di simpan
        $lokasi_file = public_path('/assets/img/produk');
        
        if(!empty($request->gambar_masakan))
        {
        //Resize Gambar Masakan
        $gambar_masakan = $request->file('gambar_masakan');
        $nama_gambar_masakan = 'produk_'. time() . '.' . $gambar_masakan->getClientOriginalExtension();
        $resize_gambar_masakan = Image::make($gambar_masakan->getRealPath());
        $resize_gambar_masakan->resize(401, 251)->save($lokasi_file . '/' . $nama_gambar_masakan);
        //End resize Gambar Masakan

        Masakan::where('id_masakan',$id)->update([
            'gambar_masakan'=>$nama_gambar_masakan,
            'nama_masakan'=>$request->namamasakan,
            'nama_kategori'=>$request->kategori,
            'harga'=>$request->hargamasakan,
            'status'=>'tersedia'
        ]);
        }else{
            Masakan::where('id_masakan',$id)->update([
                'nama_masakan'=>$request->namamasakan,
                'nama_kategori'=>$request->kategori,
                'harga'=>$request->hargamasakan,
                'status'=>'tersedia'
            ]); 
        }

        if ($request->kategori == 'makanan') {
            return redirect()->route('masakan.index')->with('message','Berhasil disimpan!');
        } elseif ($request->kategori == 'minuman') {
            return redirect()->route('minuman.index')->with('message','Berhasil disimpan!');
        } {
            return redirect()->route('dessert.index')->with('message','Berhasil disimpan!');
        }

    }

    public function delete($id)
    {
        masakan::where('id_masakan',$id)->delete();
        return redirect()->back()->with('message','Data berhasil dihapus');
    }

    public function updatestatus(Request $request, $id)
    {
        if ($request->status == 'tersedia') {
            masakan::where('id_masakan',$id)->update(['status'=>'tersedia']);
        } else {
            masakan::where('id_masakan',$id)->update(['status'=>'habis']);
        }

        return redirect()->back()->with('message','Data berhasil diubah');
        
    }

}
