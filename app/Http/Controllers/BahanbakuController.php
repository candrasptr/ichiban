<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Bahanbaku;
use Image;

class BahanbakuController extends Controller
{
    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
                'nama' => 'required|max:30',
                'qty' => 'required|max:11'
            ],
            [
                'namam.required' => 'Harus diisi',
                'nama.max' => 'Jangan lebih dari 30 huruf',
                'qty.required' => 'Harus diisi',
                'qty.max' => 'Jangan lebih dari 11 digit'
            ]
        );
    }

    public function index()
    {
        $databahan = DB::table('tbl_bahan_baku')
            ->paginate(5);
        return view('admin/bahanbaku.index', ['databahan' => $databahan]);
    }

    public function create()
    {
        return view('admin/bahanbaku.create');
    }

    public function store(Request $request)
    {
        $this->_validation($request);
        //lokasi file foto di simpan
        $lokasi_file = public_path('/assets/img/bahanbaku');

        if (!empty($request->gambar)) {
            //Resize Gambar Masakan
            $gambar = $request->file('gambar');
            $nama_gambar = 'bahan_' . time() . '.' . $gambar->getClientOriginalExtension();
            $resize_gambar = Image::make($gambar->getRealPath());
            $resize_gambar->resize(401, 251)->save($lokasi_file . '/' . $nama_gambar);
            //End resize Gambar Masakan

            $status =  Bahanbaku::create([
                'gambar' => $nama_gambar,
                'nama_bahanbaku' => $request->nama,
                'qty' => $request->qty,
            ]);
        } else {
            $status = Bahanbaku::create([
                'gambar' => 'nonimage.jpg',
                'nama_bahanbaku' => $request->nama,
                'qty' => $request->qty,
            ]);
        }

        if ($status) {
            return redirect()->route('bahanbaku.index')->with('message', 'Berhasil disimpan!');
        } else {
            return redirect()->route('bahanbaku.index')->with('message', 'Error!');
        }
    }

    public function search(Request $request)
    {
        $databahan = Bahanbaku::where('nama_bahanbaku', 'like', "%{$request->keyword}%")->paginate(5)->onEachSide(0);
        return view('admin/bahanbaku.index', ['databahan' => $databahan]);
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $qtylama =  Bahanbaku::where('id_bahanbaku', $id)->select('qty')->value('qty');
        $status = Bahanbaku::where('id_bahanbaku', $id)->update([
            'qty' => $request->qty + $qtylama,
        ]);
        if ($status) {
            return redirect()->route('bahanbaku.index')->with('message', 'Berhasil disimpan!');
        } else {
            return redirect()->route('bahanbaku.index')->with('message', 'Error!');
        }
    }

    public function delete(Request $request, $id)
    {
        Bahanbaku::where('id_bahanbaku', $id)->delete();
        return redirect()->route('bahanbaku.index')->with('message', 'Data berhasil dihapus');
    }
}
