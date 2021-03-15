<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\kasir;
use PDF;

class kasirController extends Controller
{

    private function _validation(Request $request)
    {
        $validation = $request->validate(
            [
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
            ]
        );
    }

    public function index(Request $request)
    {
        $data = kasir::where('tbl_kasir.nama_kasir', 'like', "%{$request->keyword}%")->paginate(5)->onEachSide(0);;

        return view('admin/kasir.index', (['data' => $data]));
    }

    public function create()
    {
        return view('admin/kasir.create');
    }

    public function prosescreate(Request $request)
    {
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
        return redirect()->route('kasir')->with('store', 'Berhasil disimpan!');
    }

    public function edit($id)
    {
        $data = kasir::where('id_kasir', $id)->first();
        return view('admin/kasir.edit', (['data' => $data]));
    }

    public function prosesedit(Request $request, $id)
    {
        $this->_validation($request);
        kasir::where('id_kasir', $id)->update([
            'nama_kasir' => $request->namakasir,
            'jenis_kelamin' => $request->jk,
            'alamat' => $request->alamat,
            'no_hp' => $request->nohp,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password)
        ]);
        return redirect()->route('kasir')->with('store', 'Berhasil diubah!');
    }

    public function delete($id)
    {
        kasir::where('id_kasir', $id)->delete();

        return redirect()->back()->with('message', 'Data berhasil dihapus');
    }

    public function kasir()
    {
        $transaksi = 'abc';
        return view('kasir/transaksi.index', ['transaksi' => $transaksi]);
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
            return view('kasir/transaksi.index', ['transaksi' => $order, 'transaksi2' => $ambil]);
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
            return redirect('/kasir')->with('message', 'Pembayaran kurang');
        }
    }
}
