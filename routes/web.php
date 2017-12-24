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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/backend', 'HomeController@index')->name('index');

Route::group(['prefix'=>'admin', 'middleware'=>['auth']], function () 
	{ 
		Route::resource('barang', 'BarangController');
		Route::resource('suplier', 'SuplierController');
	});
