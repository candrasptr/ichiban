<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\pelayan;
use App\Masakan;
use PDF;
use Image;

class PelayanController extends Controller
{
    private function _validation(Request $request)
    {
        // $validation = $request->validate(
        //     [
        //         'namapelayan' => 'required|max:100',
        //         'nohp' => 'required|max:12',
        //         'email' => 'required|max:50',
        //         'username' => 'required|max:50',
        //         'password' => 'required'
        //     ],
        //     [
        //         'namapelayan.required' => 'Harus diisi',
        //         'namapelayan.max' => 'Jangan lebih dari 100 huruf',
        //         'nohp.required' => 'Harus diisi',
        //         'nohp.max' => 'Jangan lebih dari 12 huruf',
        //         'email.required' => 'Harus diisi',
        //         'email.max' => 'Jangan lebih dari 50 huruf',
        //         'username.required' => 'Harus diisi',
        //         'username.max' => 'Jangan lebih dari 50 huruf',
        //         'password.required' => 'Harus diisi'
        //     ]
        // );
    }

    public function index(Request $request)
    {
        $data = pelayan::where('tbl_pelayan.nama_pelayan', 'like', "%{$request->keyword}%")->paginate(5)->onEachSide(0);;
        return view('admin/pelayan.index', (['data' => $data]));
    }

    public function create()
    {
        return view('admin/pelayan.create');
    }

    public function prosescreate(Request $request)
    {
        $this->_validation($request);
        pelayan::create([
            'nama_pelayan' => $request->namapelayan,
            'jenis_kelamin' => $request->jk,
            'alamat' => $request->alamat,
            'no_hp' => $request->nohp,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password)
        ]);
        return redirect()->route('pelayan')->with('store', 'Berhasil disimpan!');
    }

    public function edit($id)
    {
        $data = pelayan::where('id_pelayan', $id)->first();
        return view('admin/pelayan.edit', (['data' => $data]));
    }

    public function prosesedit(Request $request, $id)
    {
        $this->_validation($request);
        pelayan::where('id_pelayan', $id)->update([
            'nama_pelayan' => $request->namapelayan,
            'jenis_kelamin' => $request->jk,
            'alamat' => $request->alamat,
            'no_hp' => $request->nohp,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password)
        ]);
        return redirect()->route('pelayan')->with('store', 'Berhasil diubah!');
    }

    public function delete($id)
    {
        pelayan::where('id_pelayan', $id)->delete();

        return redirect()->back()->with('message', 'Data berhasil dihapus');
    }

   

    public function transaksi()
    {
        // $keyword = $request->keyword;

        // $data = pelayan::where('tbl_pelayan.nama_pelayan', 'like', "%{$request->keyword}%")->paginate(5)->onEachSide(0);;
        $transaksi = 'abc';
        return view('pelayan/transaksi.index',  ['transaksi' => $transaksi]);
    }

    public function pesanan()
    {
        $transaksi = DB::table('tbl_transaksi')
        ->join('tbl_pelanggan', function($join){
            $join->on('tbl_transaksi.user_transaksi_id','=','tbl_pelanggan.id_pelanggan');
        })->orderBy('tbl_transaksi.id_transaksi','desc')
        ->paginate(5);
        // $data = pelayan::where('tbl_pelayan.nama_pelayan', 'like', "%{$request->keyword}%")->paginate(5)->onEachSide(0);;

        return view('pelayan/pages.pesanan',compact('transaksi'));
    }
    
    public function pelayan()
    {
        $transaksi = DB::table('tbl_transaksi')
            ->join('tbl_pelanggan', function($join){
                $join->on('tbl_transaksi.user_transaksi_id','=','tbl_pelanggan.id_pelanggan');
            })->where('diantar','sudah')
            ->paginate(5);
        return view('pelayan/pages.pesanan',['transaksi' => $transaksi]);
    }

    public function belum_diantar()
    {
        $transaksi = DB::table('tbl_transaksi')
            ->join('tbl_pelanggan', function($join){
                $join->on('tbl_transaksi.user_transaksi_id','=','tbl_pelanggan.id_pelanggan');
            })->where('status_order','sudah_dibayar')->where('diantar','belum')
            ->paginate(5);
        return view('pelayan/pages.belumdiantar',['transaksi' => $transaksi]);
    }

    public function selesai($id)
    {
        DB::table('tbl_transaksi')->where('id_transaksi',$id)->update([
            'diantar' => 'sudah'
        ]);
        
        return redirect('pelayan/pages.pesanan');
    }

    public function laporan()
    {
        // $data = pelayan::where('tbl_pelayan.nama_pelayan', 'like', "%{$request->keyword}%")->paginate(5)->onEachSide(0);;

        return view('pelayan/pages.laporan');
    }

    //menu 

    
    public function makanan()
    {
        $data_masakan = DB::table('tbl_masakan')
        ->where('nama_kategori','makanan')
        ->paginate(5);
    	return view('pelayan/menu.index', ['data_masakan' => $data_masakan]);
    }

    public function minuman()
    {
        $data_masakan = DB::table('tbl_masakan')
        ->where('nama_kategori','minuman')
        ->paginate(5);
    	return view('pelayan/menu.minuman', ['data_masakan' => $data_masakan]);
    }
    
    public function cari_order(Request $request)
    {

        $ambil = DB::table('tbl_transaksi')->where('id_transaksi', $request->id)->where('status_order', 'belum_dibayar')->first();
        if ($ambil != '') {
            $order = DB::table('tbl_order')
                ->where('order_detail_id', $ambil->order_detail_id)
                ->join('tbl_masakan', function ($join) {
                    $join->on('tbl_order.masakan_id', '=', 'tbl_masakan.id_masakan');
                })
                ->join('tbl_pelanggan', function ($join) {
                    $join->on('tbl_order.user_order_id', '=', 'tbl_pelanggan.id_pelanggan');
                })
                ->get();
            return view('pelayan/transaksi.index', ['transaksi' => $order, 'transaksi2' => $ambil]);
        } else {
            return redirect()->back()->with('message', 'Data tidak ditemukan');
        }
    }

    public function order_bayar(Request $request, $id)
    {

        $order = DB::table('tbl_order')->where('order_detail_id', $id)
            ->join('tbl_masakan', function ($join) {
                $join->on('tbl_order.masakan_id', '=', 'tbl_masakan.id_masakan');
            })
            ->join('tbl_pelanggan', function ($join) {
                $join->on('tbl_order.user_order_id', '=', 'tbl_pelanggan.id_pelanggan');
            })
            ->get();

        $order2 = DB::table('tbl_order')->where('order_detail_id', $id)
            ->join('tbl_masakan', function ($join) {
                $join->on('tbl_order.masakan_id', '=', 'tbl_masakan.id_masakan');
            })
            ->join('tbl_pelanggan', function ($join) {
                $join->on('tbl_order.user_order_id', '=', 'tbl_pelanggan.id_pelanggan');
            })
            ->first();


        $jumlah_pembayaran = $request->jumlah_pembayaran;
        $total_harga = $order->sum('sub_total');
        $kembalian = $request->jumlah_pembayaran - $order->sum('sub_total');

        if ($jumlah_pembayaran >= $total_harga) {
            DB::table('tbl_order')
                ->where('order_detail_id', $id)->update([
                    'status_order2' => 'sudah_dibayar'
                ]);

            DB::table('tbl_transaksi')
                ->where('order_detail_id', $id)->update([
                    'jumlah_pembayaran' => $request->jumlah_pembayaran,
                    'kembalian' => $kembalian,
                    'status_order' => 'sudah_dibayar'
                ]);

            $transaksi = DB::table('tbl_transaksi')->where('order_detail_id', $id)->first();

            // return redirect('/kasir');
            $pdf = PDF::loadview('kasir/transaksi.pdf', ['transaksi' => $transaksi, 'order' => $order, 'order2' => $order2]);
            return $pdf->stream('struk-pdf');
        } else {
            return redirect('/pelayan')->with('message', 'Pembayaran kurang');
        }
    }

    public function dessert()
    {
        $data_masakan = DB::table('tbl_masakan')
        ->where('nama_kategori','dessert')
        ->paginate(5);
    	return view('pelayan/menu.dessert', ['data_masakan' => $data_masakan]);
    }

    public function create_menu()
    {
        return view('pelayan/menu.create');
    }

    public function prosescreate_menu(Request $request)
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
            return redirect()->route('pelayan.menucoffee')->with('message','Berhasil disimpan!');
        } elseif ($request->kategori == 'minuman') {
            return redirect()->route('pelayan/menu.minuman')->with('message','Berhasil disimpan!');
        } {
            return redirect()->route('pelayan/menu.dessert')->with('message','Berhasil disimpan!');
        } 
        
        
    }

    public function edit_menu($id)
    {
        $data = masakan::where('id_masakan',$id)->first();
    	return view('pelayan/menu.edit',(['data' => $data]));
    }

    public function prosesedit_menu(Request $request, $id)
    {
        // dd($request->all());
        // $this->_validation($request);
        //lokasi file foto di simpan
        $lokasi_file = public_path('/assets/img/produk');
        
        if($request->gambar_masakan)    
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
            return redirect()->route('pelayan.menucoffee')->with('message','Berhasil disimpan!');
        } elseif ($request->kategori == 'minuman') {
            return redirect()->route('pelayan/menu.minuman')->with('message','Berhasil disimpan!');
        } {
            return redirect()->route('pelayan/menu.dessert')->with('message','Berhasil disimpan!');
        } 

    }

    public function delete_menu($id)
    {
        masakan::where('id_masakan',$id)->delete();
        return redirect()->back()->with('message','Data berhasil dihapus');
    }

    public function updatestatus_menu(Request $request, $id)
    {
        if ($request->status == 'tersedia') {
            masakan::where('id_masakan',$id)->update(['status'=>'tersedia']);
        } else {
            masakan::where('id_masakan',$id)->update(['status'=>'habis']);
        }

        return redirect()->back()->with('message','Data berhasil diubah');
        
    }
}
