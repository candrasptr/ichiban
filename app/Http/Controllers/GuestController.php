<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\pelanggan;
use Auth;
use Carbon\Carbon;
use App\Masakan;
use App\order;
use PDF;


class GuestController extends Controller
{

    public function search(Request $request){
    	$data = masakan::where('nama_masakan','like',"%{$request->keyword}%")->paginate(5)->onEachSide(0);
    	return view('guest.search', ['data' => $data]);
    }
    public function login()
    {
        $now = Carbon::now('h');
        $noww = $now->isoFormat('HH');

        return view('guest.index', ['now' => $noww]);
    }

    public function index(Request $request)
    {   
        $coffee = DB::table('tbl_masakan')
            ->where('nama_kategori', 'makanan')
            ->where('status', 'tersedia')
            ->paginate(5);

        $noncoffee = DB::table('tbl_masakan')
            ->where('nama_kategori', 'minuman')
            ->where('status', 'tersedia')
            ->paginate(5);

        $makanan = DB::table('tbl_masakan')
            ->where('nama_kategori', 'dessert')
            ->where('status', 'tersedia')
            ->paginate(5);

        $order = DB::table('tbl_order')->where('status_order2', 'sedang_dipesan')->where('user_order_id', Auth::guard('pelanggan')->user()->id_pelanggan)
            ->join('tbl_masakan', function ($join) {
                $join->on('tbl_order.masakan_id', '=', 'tbl_masakan.id_masakan');
            })
            ->join('tbl_pelanggan', function ($join) {
                $join->on('tbl_order.user_order_id', '=', 'tbl_pelanggan.id_pelanggan');
            })
            ->get();

        return view('guest.home', ['coffee' => $coffee, 'noncoffee' => $noncoffee, 'makanan' => $makanan, 'order' => $order]);
    }

    public function pesan_order(Request $request)
    {
        $keranjang = DB::table('tbl_order')->where('masakan_id', $request->id_masakan)->where('user_order_id', Auth::guard('pelanggan')->user()->id_pelanggan)->first();


        if ($keranjang) {
            $ambil = DB::table('tbl_masakan')->where('id_masakan', $request->id_masakan)->first();
            $now = date('Y-m-d');
            $hasil = $ambil->harga * 1;
            order::where('id_order', $keranjang->id_order)->update([

                'jumlah' => $keranjang->jumlah + 1,
                'sub_total' => $hasil + $keranjang->sub_total,
            ]);
        } else {
            $ambil = DB::table('tbl_masakan')->where('id_masakan', $request->id_masakan)->first();
            $now = date('Y-m-d');
            $hasil = $ambil->harga * 1;
            DB::table('tbl_order')->insert([
                'masakan_id' => $request->id_masakan,
                'order_detail_id' => 0,
                'user_order_id' => Auth::guard('pelanggan')->user()->id_pelanggan,
                'tanggal_order' => $now,
                'status_order2' => 'sedang_dipesan',
                'jumlah' => '1',
                'sub_total' => $hasil
            ]);
        }
        $order = DB::table('tbl_order')
            ->join('tbl_masakan', 'tbl_order.masakan_id', '=', 'tbl_masakan.id_masakan')
            ->where('user_order_id', '=', Auth::guard('pelanggan')->user()->id_pelanggan)
            ->get();
        // $count = count($order);
        // // dd($count);
        if ($ambil->nama_kategori == 'coffee') {
            return redirect('/cart')->with('coffee', 'Scroll kebawah untuk melihat keranjang');
        } elseif ($ambil->nama_kategori == 'noncoffee') {
            return redirect('/cart')->with('noncoffee', 'Scroll kebawah untuk melihat keranjang');
        } {
            return redirect('/cart')->with('makanan', 'Scroll kebawah untuk melihat keranjang');
        }
    }

    public function cart()
    {
        $order = DB::table('tbl_order')
            ->join('tbl_masakan', 'tbl_order.masakan_id', '=', 'tbl_masakan.id_masakan')
            ->where('user_order_id', '=', Auth::guard('pelanggan')->user()->id_pelanggan)
            ->where('status_order2', '=', 'sedang_dipesan')
            ->get();
        $count = count($order);
        // dd($count);
        $snapToken = '';
        if ($snapToken) {
            $snapToken = $this->token();
        } else {
            $snapToken = '';
        }
        // $notif = $this->notif();

        return view('guest/cart', ['order' => $order, 'count' => $count, 'snapToken' => $snapToken]);
    }

    public function order_update(Request $request)
    {
        $ambil1 = DB::table('tbl_order')->where('id_order', $request->id_order)->first();
        $ambil2 = DB::table('tbl_masakan')->where('id_masakan', $ambil1->masakan_id)->first();
        $hasil = $ambil2->harga * $request->jumlah;
        DB::table('tbl_order')->where('id_order', $request->id_order)->update([
            'jumlah' => $request->jumlah,
            'sub_total' => $hasil
        ]);
        return redirect()->back()->with('alert', 'Berhasil mengubah jumlah pesan');
    }

    public function order_bayar(Request $request)
    {
        $ambil = DB::table('tbl_order')->where('user_order_id', Auth::guard('pelanggan')->user()->id_pelanggan)->where('status_order2', 'sedang_dipesan')->get();
        $order = DB::table('tbl_order')->where('id_order', $request->id_order)->where('user_order_id', Auth::guard('pelanggan')->user()->id_pelanggan)->first();
        foreach ($ambil as $a) {
            DB::table('tbl_order_detail')->insert([
                'id_order_detail' => $order->id_order,
                'order_id' => $a->id_order
            ]);
        }

        $now = date('Y-m-d');
        $transaksi = DB::table('tbl_transaksi')->get();
        $hitung = count($transaksi);
        if ($hitung < 1) {
            $no = $hitung + 5;
            $kode = "TMP" . $no;
        } else if ($hitung >= 1) {
            $no = $hitung + 5;
            $kode = "TMP" . $no;
        }
        $snap = $request->snaptoken;
        if ($snap) {
            DB::table('tbl_transaksi')->insert([
                'id_transaksi' => $kode,
                'order_detail_id' => $order->id_order,
                'tanggal_transaksi' => $now,
                'total_bayar' => $request->total_bayar,
                'jumlah_pembayaran' => $request->total_bayar,
                'kembalian' => 0,
                'user_transaksi_id' => Auth::guard('pelanggan')->user()->id_pelanggan,
                'status_order' => 'sudah_dibayar',
                'diantar' => 'belum',
            ]);
        } else {
            DB::table('tbl_transaksi')->insert([
                'id_transaksi' => $kode,
                'order_detail_id' => $order->id_order,
                'tanggal_transaksi' => $now,
                'total_bayar' => $request->total_bayar,
                'jumlah_pembayaran' => 0,
                'kembalian' => 0,
                'user_transaksi_id' => Auth::guard('pelanggan')->user()->id_pelanggan,
                'status_order' => 'belum_dibayar',
                'diantar' => 'belum',
            ]);
        }

        $ambil = DB::table('tbl_order')->where('user_order_id', Auth::guard('pelanggan')->user()->id_pelanggan)->where('status_order2', 'sedang_dipesan')->update([
            'order_detail_id' => $order->id_order,
            'status_order2' => 'sudah_dipesan'
        ]);

        $transaksi = DB::table('tbl_transaksi')->where('order_detail_id', $order->id_order)->first();

        $order = DB::table('tbl_order')->where('order_detail_id', $order->id_order)->where('user_order_id', Auth::guard('pelanggan')->user()->id_pelanggan)
            ->join('tbl_masakan', function ($join) {
                $join->on('tbl_order.masakan_id', '=', 'tbl_masakan.id_masakan');
            })
            ->join('tbl_pelanggan', function ($join) {
                $join->on('tbl_order.user_order_id', '=', 'tbl_pelanggan.id_pelanggan');
            })
            ->get();



        // $count = count($request->idproduk);
        // for ($i = 1; $i <= $count; $i++) {
        //     $tmp[] = [
        //         'id' => $request->idproduk[$i],
        //         'price' => $request->harga[$i],
        //         'quantity' => $request->qty[$i],
        //         'name' => $request->namaproduk[$i],
        //     ];
        // }

        return view('guest.struk', ['transaksi' => $transaksi, 'order' => $order, 'snap' => $snap])->with('alert', 'Transaksi berhasil');
    }

    public function order_batal($id)
    {
        DB::table('tbl_order')
            ->where('user_order_id', Auth::guard('pelanggan')->user()->id_pelanggan)
            ->where('order_detail_id', $id)->update([
                'status_order2' => 'batal_dipesan'
            ]);

        DB::table('tbl_transaksi')
            ->where('order_detail_id', $id)->update([
                'status_order' => 'batal_dipesan'
            ]);

        return redirect('/home');
    }

    public function order_hapus($id)
    {
        DB::table('tbl_order')
            ->where('id_order', $id)
            ->delete();
        return redirect('/home');
    }

    public function feedback(Request $request)
    {
        $now = date('Y-m-d');
        DB::table('tbl_feedback')->insert([
            'isi' => $request->feedback,
            'tanggal' => $now
        ]);

        return redirect('/home')->with('feedback', 'Feedback tersampaikan');
    }

    public function nota($id)
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

        $transaksi = DB::table('tbl_transaksi')->where('order_detail_id', $id)->first();

        // return view('guest.nota',['transaksi' => $transaksi, 'order' => $order,'order2' => $order2]);
        $pdf = PDF::loadview('guest.nota', ['transaksi' => $transaksi, 'order' => $order, 'order2' => $order2]);
        return $pdf->stream('struk-pdf');
    }

    public function token(Request $request)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-7D1JOC4c-5viuDWuPhNgHJzC';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        $transaksi = DB::table('tbl_transaksi')->get();
        $hitung = count($transaksi);

        if ($hitung < 1) {
            // $no = $hitung + 5;
            $no = $hitung +  mt_rand(00000, 99999);
            $kode = "TMP" . $no;
        } else if ($hitung >= 1) {
            // $no = $hitung + 5;
            $no = $hitung +  mt_rand(00000, 99999);
            $kode = "TMP" . $no;
        }
        $count = $request->count;
        for ($i = 1; $i <= $count; $i++) {
            $tmp[] = [
                'id' => $request->idproduk1[$i],
                'price' => $request->harga1[$i],
                'quantity' => $request->qty1[$i],
                'name' => $request->namaproduk1[$i],
            ];
        }

        $transaction_details = array(
            'order_id' => $kode,
            'gross_amount' =>  $request->jumlah,
        );

        $item_details = $tmp;

        $customer_details = array(
            'first_name' => Auth::guard('pelanggan')->user()->nama_pelanggan,
        );

        $time = time();

        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O", $time),
            'unit' => 'day',
            'duration'  => 1
        );

        $transaction_data = array(
            'transaction_details' => $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            // 'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

        error_log(json_encode($transaction_data));
        // $snapToken = $this->midtrans->getSnapToken($transaction_data);
        $snapToken = \Midtrans\Snap::getSnapToken($transaction_data);
        error_log($snapToken);
        // echo $snapToken;

        // Get Snap Payment Page URL
        // $paymentUrl = \Midtrans\Snap::createTransaction($transaction_data)->redirect_url;

        // Redirect to Snap Payment Page
        // return redirect()->away($paymentUrl);
        // return $snapToken;
        // return redirect('/cart',with('snapToken'));
        // return view('guest.cart', ['snapToken' => $snapToken, ]);
        // return redirect()->route('guest.cart' , ['snapToken' => $snapToken, ]);
        // $cart = $this->cart()
        $order = DB::table('tbl_order')
            ->join('tbl_masakan', 'tbl_order.masakan_id', '=', 'tbl_masakan.id_masakan')
            ->where('user_order_id', '=', Auth::guard('pelanggan')->user()->id_pelanggan)
            ->where('status_order2', '=', 'sedang_dipesan')
            ->get();
        $count = count($order);
        return view('guest/cart', ['order' => $order, 'count' => $count, 'snapToken' => $snapToken]);
    }

    public function nota_lunas($id)
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


        $transaksi = DB::table('tbl_transaksi')->where('order_detail_id', $id)->first();
        $pdf = PDF::loadview('kasir/transaksi.pdf', ['transaksi' => $transaksi, 'order' => $order, 'order2' => $order2]);
        return $pdf->stream('struk-pdf');
    }
}
