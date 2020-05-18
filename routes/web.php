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
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', 'dashboardController@index')->name('dashboard');

Route::get('/home', 'HomeController@index')->name('home');

//Jenis Donatur
Route::get('/jenisdonatur','jenisDonaturController@index')->middleware('auth');
Route::get('/jenisdonatur/create','jenisDonaturController@vcreate')->middleware('auth');
Route::post('/jenisdonatur/create','jenisDonaturController@create')->middleware('auth');
Route::get('/jenisdonatur/delete/{id}','jenisDonaturController@delete')->middleware('auth');
Route::get('/jenisdonatur/edit/{id}','jenisDonaturController@vedit')->middleware('auth');
Route::post('/jenisdonatur/edit/{id}','jenisDonaturController@edit')->middleware('auth');

//Peserta
Route::get('/peserta','pesertaController@index')->middleware('auth');
Route::get('/peserta/create','pesertaController@vcreate')->middleware('auth');
Route::post('/peserta/create','pesertaController@create')->middleware('auth');
Route::get('/peserta/delete/{id}','pesertaController@delete')->middleware('auth');
Route::get('/peserta/edit/{id}','pesertaController@vedit')->middleware('auth');
Route::post('/peserta/edit/{id}','pesertaController@edit')->middleware('auth');
Route::get('/peserta/pdf','pesertaController@makeReport')->middleware('auth');


//Donatur
Route::get('/donatur','donaturController@index')->middleware('auth');
Route::get('/donatur/create','donaturController@vcreate')->middleware('auth');
Route::post('/donatur/create','donaturController@create')->middleware('auth');
Route::get('/donatur/delete/{id}','donaturController@delete')->middleware('auth');
Route::get('/donatur/edit/{id}','donaturController@vedit')->middleware('auth');
Route::post('/donatur/edit/{id}','donaturController@edit')->middleware('auth');
Route::get('/donatur/pdf','donaturController@makeReport')->middleware('auth');


//Kegiatan
Route::get('/kegiatan','kegiatanController@index')->middleware('auth');
Route::get('/kegiatan/create','kegiatanController@vcreate')->middleware('auth');
Route::post('/kegiatan/create','kegiatanController@create')->middleware('auth');
Route::get('/kegiatan/delete/{id}','kegiatanController@delete')->middleware('auth');
Route::get('/kegiatan/edit/{id}','kegiatanController@vedit')->middleware('auth');
Route::post('/kegiatan/edit/{id}','kegiatanController@edit')->middleware('auth');
Route::get('/kegiatan/pdf','kegiatanController@makeReport')->middleware('auth');

//Perolehan
Route::get('/perolehan','perolehanController@index')->middleware('auth');
Route::get('/perolehan/create','perolehanController@vcreate')->middleware('auth');
Route::post('/perolehan/create','perolehanController@create')->middleware('auth');
Route::get('/perolehan/delete/{id}','perolehanController@delete')->middleware('auth');
Route::get('/perolehan/edit/{id}','perolehanController@vedit')->middleware('auth');
Route::post('/perolehan/edit/{id}','perolehanController@edit')->middleware('auth');


//Show Reports Kegiatan
Route::get('/reports','reportKegiatanController@index')->name('report.index');

//Generate PDF Kegiatan
Route::get('/reports/pdf','reportKegiatanController@makeReport')->name('report.make');