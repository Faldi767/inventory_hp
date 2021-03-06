<?php

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

Route::get('/', 'AdminController@index')->middleware('ceksession');

Route::get('/login', 'AuthController@login');
Route::post('/login/store', 'AuthController@store');
Route::get('/login/logout', 'AuthController@logout');

Route::get('/role', 'RoleController@index')->middleware('ceksession');
Route::get('/role/tambah', 'RoleController@tambah')->middleware('ceksession');
Route::post('/role/store', 'RoleController@store')->middleware('ceksession');
Route::get('/role/edit/{id}', 'RoleController@edit')->middleware('ceksession');
Route::put('/role/update/{id}', 'RoleController@update')->middleware('ceksession');
Route::get('/role/hapus/{id}', 'RoleController@delete')->middleware('ceksession');
Route::get('/role/trash', 'RoleController@trash')->middleware('ceksession');
Route::get('/role/restore/{id}', 'RoleController@restore')->middleware('ceksession');
Route::get('/role/restoreall', 'RoleController@restoreall')->middleware('ceksession');
Route::get('/role/hapuspermanen/{id}', 'RoleController@hapuspermanen')->middleware('ceksession');
Route::get('/role/hapusall', 'RoleController@hapusall')->middleware('ceksession');

Route::get('/client', 'ClientController@index')->middleware('ceksession');
Route::get('/client/tambah', 'ClientController@tambah')->middleware('ceksession');
Route::post('/client/store', 'ClientController@store')->middleware('ceksession');
Route::get('/client/edit/{id}', 'ClientController@edit')->middleware('ceksession');
Route::put('/client/update/{id}', 'ClientController@update')->middleware('ceksession');
Route::get('/client/hapus/{id}', 'ClientController@delete')->middleware('ceksession');
Route::get('/client/trash', 'ClientController@trash')->middleware('ceksession');
Route::get('/client/restore/{id}', 'ClientController@restore')->middleware('ceksession');
Route::get('/client/restoreall', 'ClientController@restoreall')->middleware('ceksession');
Route::get('/client/hapuspermanen/{id}', 'ClientController@hapuspermanen')->middleware('ceksession');
Route::get('/client/hapusall', 'ClientController@hapusall')->middleware('ceksession');

Route::get('/brand', 'BrandController@index')->middleware('ceksession');
Route::get('/brand/tambah', 'BrandController@tambah')->middleware('ceksession');
Route::post('/brand/store', 'BrandController@store')->middleware('ceksession');
Route::get('/brand/edit/{id}', 'BrandController@edit')->middleware('ceksession');
Route::put('/brand/update/{id}', 'BrandController@update')->middleware('ceksession');
Route::get('/brand/hapus/{id}', 'BrandController@delete')->middleware('ceksession');
Route::get('/brand/trash', 'BrandController@trash')->middleware('ceksession');
Route::get('/brand/restore/{id}', 'BrandController@restore')->middleware('ceksession');
Route::get('/brand/restoreall', 'BrandController@restoreall')->middleware('ceksession');
Route::get('/brand/hapuspermanen/{id}', 'BrandController@hapuspermanen')->middleware('ceksession');
Route::get('/brand/hapusall', 'BrandController@hapusall')->middleware('ceksession');

Route::get('/supplier', 'SupplierController@index')->middleware('ceksession');
Route::get('/supplier/tambah', 'SupplierController@tambah')->middleware('ceksession');
Route::post('/supplier/store', 'SupplierController@store')->middleware('ceksession');
Route::get('/supplier/edit/{id}', 'SupplierController@edit')->middleware('ceksession');
Route::put('/supplier/update/{id}', 'SupplierController@update')->middleware('ceksession');
Route::get('/supplier/hapus/{id}', 'SupplierController@delete')->middleware('ceksession');
Route::get('/supplier/trash', 'SupplierController@trash')->middleware('ceksession');
Route::get('/supplier/restore/{id}', 'SupplierController@restore')->middleware('ceksession');
Route::get('/supplier/restoreall', 'SupplierController@restoreall')->middleware('ceksession');
Route::get('/supplier/hapuspermanen/{id}', 'SupplierController@hapuspermanen')->middleware('ceksession');
Route::get('/supplier/hapusall', 'SupplierController@hapusall')->middleware('ceksession');

Route::get('/toko', 'TokoController@index')->middleware('ceksession');
Route::get('/toko/tambah', 'TokoController@tambah')->middleware('ceksession');
Route::post('/toko/store', 'TokoController@store')->middleware('ceksession');
Route::get('/toko/edit/{id}', 'TokoController@edit')->middleware('ceksession');
Route::put('/toko/update/{id}', 'TokoController@update')->middleware('ceksession');
Route::get('/toko/hapus/{id}', 'TokoController@delete')->middleware('ceksession');
Route::get('/toko/trash', 'TokoController@trash')->middleware('ceksession');
Route::get('/toko/restore/{id}', 'TokoController@restore')->middleware('ceksession');
Route::get('/toko/restoreall', 'TokoController@restoreall')->middleware('ceksession');
Route::get('/toko/hapuspermanen/{id}', 'TokoController@hapuspermanen')->middleware('ceksession');
Route::get('/toko/hapusall', 'TokoController@hapusall')->middleware('ceksession');

Route::get('/smartphone', 'SmartphoneController@index')->middleware('ceksession');
Route::get('/smartphone/tambah', 'SmartphoneController@tambah')->middleware('ceksession');
Route::post('/smartphone/store', 'SmartphoneController@store')->middleware('ceksession');
Route::get('/smartphone/edit/{id}', 'SmartphoneController@edit')->middleware('ceksession');
Route::put('/smartphone/update/{id}', 'SmartphoneController@update')->middleware('ceksession');
Route::get('/smartphone/hapus/{id}', 'SmartphoneController@delete')->middleware('ceksession');
Route::get('/smartphone/trash', 'SmartphoneController@trash')->middleware('ceksession');
Route::get('/smartphone/restore/{id}', 'SmartphoneController@restore')->middleware('ceksession');
Route::get('/smartphone/restoreall', 'SmartphoneController@restoreall')->middleware('ceksession');
Route::get('/smartphone/hapuspermanen/{id}', 'SmartphoneController@hapuspermanen')->middleware('ceksession');
Route::get('/smartphone/hapusall', 'SmartphoneController@hapusall')->middleware('ceksession');

Route::get('/barangmasuk', 'BarangMasukController@index')->middleware('ceksession');
Route::get('/barangmasuk/tambah', 'BarangMasukController@tambah')->middleware('ceksession');
Route::post('/barangmasuk/store', 'BarangMasukController@store')->middleware('ceksession');

Route::get('/transaksi', 'TransaksiController@index')->middleware('ceksession');
Route::get('/transaksi/tambah', 'TransaksiController@tambah')->middleware('ceksession');
Route::post('/transaksi/store', 'TransaksiController@store')->middleware('ceksession');
Route::get('/transaksi/edit/{id}', 'TransaksiController@edit')->middleware('ceksession');
Route::put('/transaksi/update/{id}', 'TransaksiController@update')->middleware('ceksession');
Route::get('/transaksi/hapus/{id}', 'TransaksiController@delete')->middleware('ceksession');