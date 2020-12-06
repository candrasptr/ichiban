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

	Route::view('/orderan','admin/orderan.index');
	Route::view('/orderan/detail','admin/orderan.detail')->name('orderan.detail');

	Route::view('/laporan','admin/laporan.index');

	Route::view('/transaksi','admin/transaksi.index');
});

Route::group(['middleware' => 'auth:pelanggan'], function(){
Route::view('/home','guest/home');
Route::view('/menu','guest/menu');
Route::view('/makanan','guest/makanan');
Route::view('/minuman','guest/minuman');
Route::view('/dessert','guest/dessert');
Route::view('/keranjang','guest/keranjang');
});

// kasir
Route::group(['middleware' => 'auth:kasir'], function(){
	Route::view('/kasir','kasir/transaksi.index');
});


// waiter
Route::group(['middleware' => 'auth:waiter'], function(){
	Route::view('/loginwaiter','waiter/login.index');
	Route::view('/waiter','waiter/orderan.index');
	Route::view('/waiter/detail','waiter/orderan.detail');
	Route::view('/laporanwaiter','waiter/laporan.index');
});




