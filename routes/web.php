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