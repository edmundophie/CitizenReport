<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Main pages
Route::get('/', 'PagesController@index');

Route::get('/index', 'PagesController@index');

Route::get('/daftar-pengaduan/{sort}', 'PagesController@daftarPengaduan');

Route::get('/daftar-pengaduan/kategori/{id_kategori}', 'PagesController@daftarPengaduanByKategori');

Route::get('/statistik', 'PagesController@statistik');

Route::get('/buat-pengaduan', 'PagesController@buatPengaduan');

// Class
Route::get('/pengaduan/{slug}', 'PengaduanController@show');

Route::get('/pengaduan/{slug}/delete', 'PengaduanController@delete');

Route::post('/pengaduan/insert', 'PengaduanController@insert');

Route::post('/pengaduan/update-status', 'PengaduanController@updateStatus');

Route::post('/pengaduan/add-feedback', 'PengaduanController@addFeedback');

Route::post('/pengaduan/upload-laporan', 'PengaduanController@uploadReport');
