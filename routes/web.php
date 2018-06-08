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

Route::get('/', 'ControllerLogin@index');
Route::get('/login', 'ControllerLogin@login');
Route::post('/loginPost', 'ControllerLogin@loginPost');
Route::get('/logout','ControllerLogin@logout');
Route::resource('admin','ControllerAdmin');
Route::resource('pesan','ControllerPesan');
Route::resource('layanan','ControllerLayanan');
Route::resource('subcatering','ControllerSubCatering');
Route::resource('slide','ControllerSlide');
Route::resource('informasi','ControllerInformasi');
Route::resource('berita','ControllerBerita');
Route::post('/sendEmail/{id_pesan}', 'ControllerPesanDetail@sendEmail');

Route::post('upload_image','ControllerBerita@uploadImage')->name('upload');