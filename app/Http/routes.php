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

Route::get('/login', 'PagesController@login');

Route::get('/index', 'PagesController@index');

Route::get('/daftar-pengaduan/{sort}', 'PagesController@daftarPengaduan');

Route::get('/daftar-pengaduan/kategori/{id_kategori}', 'PagesController@daftarPengaduanByKategori');

Route::get('/statistik', 'PagesController@statistik');

Route::get('/buat-pengaduan', 'PagesController@buatPengaduan');

Route::get('/manajemen-skpd', 'PagesController@manajemenSKPD');

Route::get('/manajemen-kategori', 'PagesController@manajemenKategori');

Route::get('/edit-skpd/{id_skpd}', 'PagesController@editSKPD');

Route::get('logout', 'SessionController@logout');

// Class
Route::get('/pengaduan/{slug}', 'PengaduanController@show');

Route::get('/pengaduan/{slug}/forward', 'PengaduanController@forward');

Route::get('/pengaduan/{slug}/reject', 'PengaduanController@reject');

Route::get('/pengaduan/{slug}/delete', 'PengaduanController@delete');

Route::get('/pengaduan/{slug}/kirim', 'PengaduanController@kirim');

Route::post('/pengaduan/insert', 'PengaduanController@insert');

Route::post('/pengaduan/update-status', 'PengaduanController@updateStatus');

Route::post('/pengaduan/add-feedback', 'PengaduanController@addFeedback');

Route::post('/pengaduan/upload-laporan', 'PengaduanController@uploadReport');

Route::post('/komentar/insert', 'KomentarController@insert');

Route::post('/login', 'SessionController@login');

Route::post('/manajemen-skpd', 'SKPDController@insert');

Route::get('/delete-skpd/{id_skpd}', 'SKPDController@delete');

Route::post('/update-skpd', 'SKPDController@update');

Route::post('/manajemen-kategori', 'KategoriController@insert');

Route::get('/delete-kategori/{id_kategori}', 'KategoriController@delete');
