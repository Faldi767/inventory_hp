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

Route::get('/', 'AdminController@index');
Route::get('/login', 'AuthController@login');

Route::get('/role', 'RoleController@index');
Route::get('/role/tambah', 'RoleController@tambah');
Route::post('/role/store', 'RoleController@store');
Route::get('/role/edit/{id}', 'RoleController@edit');
Route::put('/role/update/{id}', 'RoleController@update');
Route::get('/role/hapus/{id}', 'RoleController@delete');
Route::get('/role/trash', 'RoleController@trash');
Route::get('/role/restore/{id}', 'RoleController@restore');
Route::get('/role/restoreall', 'RoleController@restoreall');
Route::get('/role/hapuspermanen/{id}', 'RoleController@hapuspermanen');
Route::get('/role/hapusall', 'RoleController@hapusall');

Route::get('/client', 'ClientController@index');
Route::get('/client/tambah', 'ClientController@tambah');
Route::post('/client/store', 'ClientController@store');
Route::get('/client/edit/{id}', 'ClientController@edit');
Route::put('/client/update/{id}', 'ClientController@update');
Route::get('/client/hapus/{id}', 'ClientController@delete');
Route::get('/client/trash', 'ClientController@trash');
Route::get('/client/restore/{id}', 'ClientController@restore');
Route::get('/client/restoreall', 'ClientController@restoreall');
Route::get('/client/hapuspermanen/{id}', 'ClientController@hapuspermanen');
Route::get('/client/hapusall', 'ClientController@hapusall');