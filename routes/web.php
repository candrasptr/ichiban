<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('guest.index');
});

Route::get('/login', 'LoginController@index')->name('login');
Route::get('/logout', 'LoginController@logout');
Route::get('/logout', 'PelangganController@logout')->name('pelanggan.logout');
Route::post('/proseslogin', 'LoginController@login');
Route::post('/prosesloginpelanggan', 'PelangganController@login');
Route::group(['middleware' => 'auth:admin'], function(){

	Route::view('/dashboard','admin/dashboard.index');

	Route::get('/masakan', 'MasakanController@makanan')->name('masakan.index');
	Route::get('/adminminuman', 'MasakanController@minuman')->name('minuman.index');
	Route::get('/admindessert', 'MasakanController@dessert')->name('dessert.index');
	Route::post('/prosescreatemasakan', 'MasakanController@prosescreate');
	Route::get('/masakan/tambah','MasakanController@create')->name('masakan.tambah');
	Route::get('/masakan/{id}/edit','MasakanController@edit')->name('masakan.edit');
	Route::post('/prosesedit/{id}','MasakanController@prosesedit')->name('masakan.prosesedit');
	Route::delete('/masakan/delete/{id}','MasakanController@delete')->name('masakan.delete');
	Route::post('/updatestatus/{id}','MasakanController@updatestatus')->name('masakan.updatestatus');

	Route::view('/kategori','admin/kategori.index');
	Route::view('/kategori/tambah','admin/kategori.create')->name('kategori.tambah');
	Route::view('/kategori/edit','admin/kategori.edit')->name('kategori.edit');

	Route::get('/admin','AdminController@index')->name('admin');
	Route::get('/admin/tambah','AdminController@create')->name('admin.tambah');
	Route::get('/admin/edit','AdminController@edit')->name('admin.edit');
	Route::post('/prosescreateadmin','AdminController@prosescreate');
	Route::get('/admin/{id}/edit','AdminController@edit')->name('admin.edit');
	Route::patch('/prosesedit/{id}','AdminController@prosesedit')->name('prosesedit');
	Route::delete('/admin/delete/{id}','AdminController@delete')->name('admin.delete');

	Route::get('/waiterindex','WaiterController@index')->name('waiter');
	Route::get('/waiter/tambah','WaiterController@create')->name('waiter.tambah');
	Route::get('/waiter/edit/{id}','WaiterController@edit')->name('waiter.edit');
	Route::post('/prosescreatewaiter','WaiterController@prosescreate');
	Route::patch('/proseseditwaiter/{id}','WaiterController@prosesedit')->name('waiter.prosesedit');
	Route::delete('/waiter/delete/{id}','WaiterController@delete')->name('waiter.delete');

	Route::get('/kasirindex','KasirController@index')->name('kasir');
	Route::get('/kasir/tambah','KasirController@create')->name('kasir.tambah');
	Route::get('/kasir/edit','KasirController@edit')->name('kasir.edit');
	Route::post('/prosescreatekasir','KasirController@prosescreate');
	Route::get('/kasir/{id}/edit','KasirController@edit')->name('kasir.edit');
	Route::patch('/proseseditkasir/{id}','KasirController@prosesedit')->name('kasir.prosesedit');
	Route::delete('/kasir/delete/{id}','KasirController@delete')->name('kasir.delete');

	Route::get('/pelanggan','PelangganController@index');

	Route::get('/orderan','OrderanController@index');
	Route::get('/orderan/detail/{id}','OrderanController@order_detail')->name('orderan.detail');
	Route::get('/orderan/struk/{id}','OrderanController@order_struk')->name('orderan.struk');
	Route::get('/filter_penjualan','OrderanController@filter_penjualan');
	Route::get('/orderan_belum','OrderanController@belum');
	Route::get('/filter_penjualan_belum','OrderanController@filter_penjualan_belum');
	Route::get('/orderan_batal','OrderanController@batal');
	Route::get('/filter_penjualan_batal','OrderanController@filter_penjualan_batal');
	Route::get('/orderan_belum_diantar','OrderanController@belum_diantar');
	Route::get('/filter_penjualan_belum_diantar','OrderanController@filter_penjualan_belum_diantar');
	Route::get('/selesai/{id}','OrderanController@selesai')->name('order.selesai');
	Route::get('/batal/{id}','OrderanController@batalkan')->name('order.batalkan');

	Route::view('/laporan','admin/laporan.index');
	Route::get('/rekap_laporan', 'LaporanController@pdf');

	Route::get('/transaksi','TransaksiController@index');
	Route::post('/cari_order','TransaksiController@cari_order');
	Route::post('/order_bayar/{id}','TransaksiController@order_bayar')->name('order.bayar');
});

// pelanggan
Route::group(['middleware' => 'auth:pelanggan'], function(){
	Route::get('/home','GuestController@index');
	Route::post('/pesan_order','GuestController@pesan_order');
	Route::post('/order_update','GuestController@order_update');
	Route::post('/order_bayar','GuestController@order_bayar');
	Route::get('/order_batal/{id}','GuestController@order_batal')->name('order.batal');
	Route::get('/order_hapus/{id}','GuestController@order_hapus')->name('order.hapus');
	Route::view('/menu','guest/menu');
	Route::view('/makanan','guest/makanan');
	Route::view('/minuman','guest/minuman');
	Route::view('/dessert','guest/dessert');
	Route::view('/keranjang','guest/keranjang');
});

// kasir
Route::group(['middleware' => 'auth:kasir'], function(){
	Route::get('/kasir','KasirController@kasir');
	Route::post('/cari_order_kasir','KasirController@cari_order');
	Route::post('/kasir_bayar/{id}','KasirController@order_bayar')->name('kasir.bayar');
});


// waiter
Route::group(['middleware' => 'auth:waiter'], function(){
	Route::view('/loginwaiter','waiter/login.index');
	Route::view('/waiter','waiter/orderan.index');
	Route::view('/waiter/detail','waiter/orderan.detail');
	Route::view('/laporanwaiter','waiter/laporan.index');
});




