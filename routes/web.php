<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/pegawai', 'PegawaiController@index');
Route::get('/tambah_pegawai', 'PegawaiController@tambah_pegawai_form');
Route::post('/tambah_pegawai', 'PegawaiController@tambah_pegawai');
Route::get('/update_pegawai/{id}', 'PegawaiCOntroller@update_pegawai');
Route::post('/update_pegawai', 'PegawaiController@save_pegawai');
Route::post('/hapus_pegawai', 'PegawaiController@hapus_pegawai');
Route::get('/view_pegawai/{id}', 'PegawaiController@view_pegawai');

//Menu Pangkat dan Golongan
Route::get('/pangkat/index', 'PegawaiController@index_pangkat');
Route::get('/pangkat/tambah', 'PegawaiController@tambah_pangkat');
Route::post('/pangkat/tambah', 'PegawaiController@save_pangkat');
Route::get('/pangkat/edit/{id}', 'PegawaiController@edit_pangkat');
Route::post('/pangkat/edit', 'PegawaiController@save_pangkat');
Route::post('/pangkat/hapus', 'PegawaiController@hapus_pangkat');

//Menu Laporan Data Pegawai
Route::get('/laporan/tkk', 'LaporanController@index_tkk');
Route::get('/laporan/tks', 'LaporanController@index_tks');
Route::get('/laporan/pns', 'LaporanController@index_pns');

//Menu Pangkat dan Golongan (Kepegawaian)
Route::get('/kepegawaian/pangkat_golongan/index', 'PegawaiController@index_pangkat_golongan');
Route::get('/kepegawaian/pangkat_golongan/tambah', 'PegawaiController@tambah_pangkat_golongan');
Route::post('/kepegawaian/pangkat_golongan/tambah', 'PegawaiController@save_pangkat_golongan');
Route::get('/kepegawaian/pangkat_golongan/edit/{id}', 'PegawaiController@edit_pangkat_golongan');
Route::post('/kepegawaian/pangkat_golongan/edit', 'PegawaiController@save_pangkat_golongan');
Route::post('/kepegawaian/pangkat_golongan/hapus', 'PegawaiController@hapus_pangkat_golongan');

//Menu TKS
Route::get('/kepegawaian/perpanjang_tks', 'PegawaiController@index_perpanjang_tks');
Route::get('/kepegawaian/tambah_perpanjang_tks', 'PegawaiController@tambah_perpanjang_tks');
Route::get('/kepegawaian/simpan_perpanjang_tks', 'PegawaiController@simpan_perpanjang_tks');
Route::post('/kepegawaian/update_perpanjang_tks', 'PegawaiController@simpan_update_perpanjang_tks');
Route::get('/kepegawaian/update_perpanjang_tks/{id}', 'PegawaiController@update_perpanjang_tks');
Route::post('/kepegawaian/hapus_perpanjangan', 'PegawaiController@hapus_perpanjang_tks');

//Menu TKK
Route::get('/kepegawaian/perpanjang_tkk', 'PegawaiController@index_perpanjang_tkk');
Route::get('/kepegawaian/tambah_perpanjang_tkk', 'PegawaiController@tambah_perpanjang_tkk');
Route::get('/kepegawaian/simpan_perpanjang_tkk', 'PegawaiController@simpan_perpanjang_tkk');
Route::post('/kepegawaian/update_perpanjang_tkk', 'PegawaiController@simpan_update_perpanjang_tkk');
Route::get('/kepegawaian/update_perpanjang_tkk/{id}', 'PegawaiController@update_perpanjang_tkk');
Route::post('/kepegawaian/hapus_perpanjangan_tkk', 'PegawaiController@hapus_perpanjang_tkk');

//Menu Riwayat Pendidikan
Route::get('/riwayat_pendidikan/index', 'RiwayatPendidikanController@index');
Route::get('/riwayat_pendidikan/tambah', 'RiwayatPendidikanController@tambah');
Route::post('/riwayat_pendidikan/save', 'RiwayatPendidikanController@tambah_riwayat');

//Menu Pensiun
Route::get('/pensiun', 'PegawaiController@index_pensiun');
Route::get('/pensiun/tambah', 'PegawaiController@tambah_pensiun');
Route::post('/pensiun/tambah', 'PegawaiController@save_pensiun');
Route::get('/pensiun/edit/{id}', 'PegawaiController@edit_pensiun');
Route::post('/pensiun/hapus', 'PegawaiController@hapus_pensiun');