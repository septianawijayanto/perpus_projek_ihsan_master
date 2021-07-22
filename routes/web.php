<?php

use Illuminate\Support\Facades\Auth;
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
    return redirect('login');
});
Route::get('login', 'LoginController@index');
Route::post('post/login', 'LoginController@postlogin');
Route::get('keluar', 'LoginController@logout');


Route::group(['middleware' => 'admin'], function () {
    Route::prefix('/admin')->group(function () {
        route::get('/dashboard', 'Backend\DashboardController@index')->name('dashboard');
        //anggota
        route::get('/anggota', 'Backend\AnggotaController@index')->name('anggota');
        route::post('/anggota/create', 'Backend\AnggotaController@create');
        route::get('/anggota/edit/{id}', 'Backend\AnggotaController@edit');
        route::post('/anggota/update/{id}', 'Backend\AnggotaController@update');
        route::get('/anggota/delete/{id}', 'Backend\AnggotaController@delete');

        //admin
        route::get('/admin', 'Backend\AdminController@index')->name('admin');
        route::post('/admin/create', 'Backend\AdminController@create');
        route::get('/admin/edit/{id}', 'Backend\AdminController@edit');
        route::post('/admin/update/{id}', 'Backend\AdminController@update');
        route::get('/admin/delete/{id}', 'Backend\AdminController@delete');

        //buku
        route::get('/buku', 'Backend\BukuController@index')->name('buku');
        route::post('/buku/create', 'Backend\BukuController@create');
        route::get('/buku/edit/{id}', 'Backend\BukuController@edit');
        route::post('/buku/update/{id}', 'Backend\BukuController@update');
        route::get('/buku/delete/{id}', 'Backend\BukuController@delete');
        Route::get('/buku/export', 'Backend\BukuController@export');
        Route::post('/buku/import', 'Backend\BukuController@import');

        //transaksi
        route::get('/transaksi', 'Backend\TransaksiController@index')->name('peminjaman');
        route::post('/transaksi/create', 'Backend\TransaksiController@create');
        // route::get('transaksi/setujui/{id}', 'Backend\TransaksiController@setujui');
        Route::match(['get', 'post'], 'transaksi/setujui/{id}', 'Backend\TransaksiController@setujui');

        route::get('transaksi/tolak/{id}', 'Backend\TransaksiController@tolak');
        route::get('transaksi/perpanjang/{id}', 'Backend\TransaksiController@perpanjang');

        //pengembalian
        route::get('/pengembalian', 'Backend\PengembalianController@index')->name('pengembalian');
        route::get('pengembalian/kembali/{id}', 'Backend\PengembalianController@kembalikan');
        route::get('pengembalian/rusak/{id}', 'Backend\PengembalianController@rusak');
        route::get('pengembalian/hilang/{id}', 'Backend\PengembalianController@hilang');

        //denda        
        Route::get('/denda', 'Backend\DendaController@index')->name('denda');
        Route::get('/denda/ganti/{id}', 'Backend\DendaController@ganti');
        Route::get('/denda/kwitansi/{id}', 'Backend\DendaController@kwitansi');

        //laporan
        Route::get('/laporan', 'Backend\LaporanController@index')->name('laporan');
        Route::get('/laporan/pdf', 'Backend\LaporanController@pdf');
        Route::get('/laporan/peminjamanpdf', 'Backend\LaporanController@peminjamanpdf');
        Route::get('/laporan/periodepdf', 'Backend\LaporanController@periodepdf');
        Route::get('/laporan/anggotapdf', 'Backend\LaporanController@anggotapdf');
        Route::get('/laporan/bukupdf', 'Backend\LaporanController@bukupdf');
    });
});

Route::group(['middleware' => 'anggota'], function () {
    Route::prefix('/anggota')->group(function () {
        //Dashboard
        Route::get('dashboard', 'Anggota\DashboardController@index')->name('adashboard');
        Route::get('buku', 'Anggota\BukuController@index')->name('abuku');
        Route::get('transaksi', 'Anggota\TransaksiController@index')->name('atransaksi');
        Route::post('transaksi/create', 'Anggota\TransaksiController@create');
    });
});
