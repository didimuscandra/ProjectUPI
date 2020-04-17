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
