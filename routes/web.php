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

Route::get('/', 'GuestController@login');

Route::get('/login', 'LoginController@index')->name('login');
Route::get('/logout', 'LoginController@logout');
Route::get('/logoutt', 'PelangganController@logout')->name('pelanggan.logout');
Route::post('/proseslogin', 'LoginController@login');
Route::post('/prosesloginpelanggan', 'PelangganController@login');
Route::get('/rekap_laporan', 'LaporanController@pdf');


Route::group(['middleware' => 'auth:admin'], function () {

	Route::get('/dashboard', 'DashboardController@index');

	Route::get('/masakan', 'MasakanController@makanan')->name('masakan.index');
	Route::get('/adminminuman', 'MasakanController@minuman')->name('minuman.index');
	Route::get('/admindessert', 'MasakanController@dessert')->name('dessert.index');
	Route::post('/prosescreatemasakan', 'MasakanController@prosescreate');
	Route::get('/masakan/tambah', 'MasakanController@create')->name('masakan.tambah');
	Route::get('/masakan/{id}/edit', 'MasakanController@edit')->name('masakan.edit');
	Route::post('/prosesedit/{id}', 'MasakanController@prosesedit')->name('masakan.prosesedit');
	Route::delete('/masakan/delete/{id}', 'MasakanController@delete')->name('masakan.delete');
	Route::post('/updatestatus/{id}', 'MasakanController@updatestatus')->name('masakan.updatestatus');

	Route::get('/ownerlist', 'OwnerController@index')->name('ownerlist');
	Route::get('/owneredit/{id}', 'OwnerController@edit')->name('owner.edit');
	Route::patch('/prosesedit_owner/{id}', 'OwnerController@prosesedit')->name('prosesedit.owner');

	Route::get('/admin', 'AdminController@index')->name('admin');
	Route::get('/admin/tambah', 'AdminController@create')->name('admin.tambah');
	Route::get('/admin/edit', 'AdminController@edit')->name('admin.edit');
	Route::post('/prosescreateadmin', 'AdminController@prosescreate');
	Route::get('/admin/{id}/edit', 'AdminController@edit')->name('admin.edit');
	Route::patch('/prosesedit/{id}', 'AdminController@prosesedit')->name('prosesedit');
	Route::delete('/admin/delete/{id}', 'AdminController@delete')->name('admin.delete');

	Route::get('/waiterindex', 'WaiterController@index')->name('waiter');
	Route::get('/waiter/tambah', 'WaiterController@create')->name('waiter.tambah');
	Route::get('/waiter/edit/{id}', 'WaiterController@edit')->name('waiter.edit');
	Route::post('/prosescreatewaiter', 'WaiterController@prosescreate');
	Route::patch('/proseseditwaiter/{id}', 'WaiterController@prosesedit')->name('waiter.prosesedit');
	Route::delete('/waiter/delete/{id}', 'WaiterController@delete')->name('waiter.delete');

	Route::get('/kasirindex', 'KasirController@index')->name('kasir');
	Route::get('/kasir/tambah', 'KasirController@create')->name('kasir.tambah');
	Route::get('/kasir/edit', 'KasirController@edit')->name('kasir.edit');
	Route::post('/prosescreatekasir', 'KasirController@prosescreate');
	Route::get('/kasir/{id}/edit', 'KasirController@edit')->name('kasir.edit');
	Route::patch('/proseseditkasir/{id}', 'KasirController@prosesedit')->name('kasir.prosesedit');
	Route::delete('/kasir/delete/{id}', 'KasirController@delete')->name('kasir.delete');

	Route::get('/pelanggan', 'PelangganController@index');

	Route::get('/orderan', 'OrderanController@index');
	Route::get('/orderan/detail/{id}', 'OrderanController@order_detail')->name('orderan.detail');
	Route::get('/orderan/struk/{id}', 'OrderanController@order_struk')->name('orderan.struk');
	Route::get('/filter_penjualan', 'OrderanController@filter_penjualan');
	Route::get('/orderan_belum', 'OrderanController@belum');
	Route::get('/filter_penjualan_belum', 'OrderanController@filter_penjualan_belum');
	Route::get('/orderan_batal', 'OrderanController@batal');
	Route::get('/filter_penjualan_batal', 'OrderanController@filter_penjualan_batal');
	Route::get('/orderan_belum_diantar', 'OrderanController@belum_diantar');
	Route::get('/filter_penjualan_belum_diantar', 'OrderanController@filter_penjualan_belum_diantar');
	Route::get('/order/{id}', 'OrderanController@selesai')->name('order.selesai');
	Route::get('/orde/{id}', 'OrderanController@batalkan')->name('batal');
	Route::delete('/ordeee/{id}', 'OrderanController@hapus')->name('order.delete');

	Route::view('/laporan', 'admin/laporan.index');

	Route::get('/transaksi', 'TransaksiController@index');
	Route::post('/cari_order', 'TransaksiController@cari_order');
	Route::post('/order_bayar/{id}', 'TransaksiController@order_bayar')->name('order.bayar');

	Route::get('/feedback-list', 'AdminController@feedback');
	Route::get('/delete-all', 'AdminController@delete_all');
	Route::delete('/feedback/delete/{id}', 'AdminController@feedbackdelete')->name('feedback.delete');
});

// pelanggan
Route::group(['middleware' => 'auth:pelanggan'], function () {
	Route::get('/home', 'GuestController@index');
	Route::post('/pesan_order', 'GuestController@pesan_order');
	Route::post('/order_update', 'GuestController@order_update');
	Route::post('/order_bayar', 'GuestController@order_bayar');
	Route::get('/order_batal/{id}', 'GuestController@order_batal')->name('order.batal');
	Route::get('/nota/{id}', 'GuestController@nota')->name('nota');
	Route::get('/order_hapus/{id}', 'GuestController@order_hapus')->name('order.hapus');
	Route::view('/menu', 'guest/menu');
	Route::view('/makanan', 'guest/makanan');
	Route::view('/minuman', 'guest/minuman');
	Route::view('/dessert', 'guest/dessert');
	Route::view('/feedback', 'guest/feedback');
	Route::post('/feedback-confirm', 'GuestController@feedback');
});

// kasir
Route::group(['middleware' => 'auth:kasir'], function () {
	Route::get('/kasir', 'KasirController@kasir');
	Route::post('/cari_order_kasir', 'KasirController@cari_order');
	Route::post('/kasir_bayar/{id}', 'KasirController@order_bayar')->name('kasir.bayar');
	Route::view('/kasir_laporan', 'kasir/transaksi.laporan');
});


// waiter
Route::group(['middleware' => 'auth:waiter'], function () {
	Route::get('/waiter', 'WaiterController@waiter');
	Route::get('/waiter/detail/{id}', 'WaiterController@order_detail')->name('waiter.detail');
	Route::get('/waiter/struk/{id}', 'WaiterController@order_struk')->name('waiter.struk');
	Route::get('/waiter_filter_penjualan', 'WaiterController@filter_penjualan');
	Route::get('/waiter_belum', 'WaiterController@belum');
	Route::get('/waiter_filter_penjualan_belum', 'WaiterController@filter_penjualan_belum');
	Route::get('/waiter_batal', 'WaiterController@batal');
	Route::get('/waiter_filter_penjualan_batal', 'WaiterController@filter_penjualan_batal');
	Route::get('/waiter_belum_diantar', 'WaiterController@belum_diantar');
	Route::get('/waiter_filter_penjualan_belum_diantar', 'WaiterController@filter_penjualan_belum_diantar');
	Route::get('/selesai/{id}', 'WaiterController@selesai')->name('waiter.selesai');
	Route::get('/batal/{id}', 'WaiterController@batalkan')->name('waiter.batalkan');
	Route::get('/bat/{id}', 'WaiterController@order_delete')->name('waiter.order.delete');
	Route::view('/waiter_laporan', 'waiter/laporan.index');
	Route::get('/waiter_rekap_laporan', 'LaporanController@pdf');
});

// owner
Route::group(['middleware' => 'auth:owner'], function () {
	Route::view('/owner', 'owner/laporan.index');
	Route::get('/owner_rekap_laporan', 'LaporanController@pdf');
});
