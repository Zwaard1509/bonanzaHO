<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaseController as ControllersBaseController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\PelangganController; 
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProdukTitipanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\ContactController;

Route::get('/login', [UserController::class, 'index'])->name('/login');
Route::get('/', [ControllersBaseController::class, 'index']);
Route::get('dashboard', [ControllersBaseController::class, 'index']);
//route kategori
Route::resource('kategori', KategoriController::class);
Route::get('excel-kategori', [KategoriController::class, 'exportData'])->name('export-kategori');
Route::post('import-kategori', [KategoriController::class, 'importData']);
//route jenis
Route::resource('jenis', JenisController::class);
Route::get('excel-jenis', [JenisController::class, 'exportData'])->name('export-jenis');
Route::post('import-jenis', [JenisController::class, 'importData']);
//route menu
Route::resource('menu', MenuController::class);
Route::get('export-menu', [MenuController::class, 'exportData'])->name('export-menu');
Route::post('import-menu', [MenuController::class, 'importData']);
//route stok
Route::resource('stok', StokController::class);
//route pelanggan
Route::resource('pelanggan', PelangganController::class);
//route karyawan
Route::resource('karyawan', KaryawanController::class);
// Route::put('/karyawan/{id}', 'KaryawanController@update')->name('karyawan.index');
Route::resource('meja', MejaController::class);
Route::resource('pemesanan', PemesananController::class);
Route::resource('transaksi', TransaksiController::class);
Route::get('nota/{noFaktur}', [TransaksiController::class, 'faktur']);
// Route::get('detailtransaksi', [DetailTransaksiController::class, 'index']);
Route::get('about', [AboutController::class, 'index']);
//route Absensi
Route::resource('absensi', AbsensiController::class);
Route::get('excel-absensi', [AbsensiController::class, 'exportData'])->name('export-absensi');
// Route::put('/absensi/{absensi}', [AbsensiController::class, 'update']);
// route produk titipan
Route::resource('produktitipan', ProdukTitipanController::class);
Route::get('excel-produktitipan', [ProdukTitipanController::class, 'exportData'])->name('export-produktitipan');
Route::post('import-produktitipan', [ProdukTitipanController::class, 'importData']);
// login
Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/login', [UserController::class, 'cekLogin'])->name('cekLogin');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
// contact
// routes/web.php
Route::get('/contact', [ContactController::class, 'index']);
// Route::group(['middleware' => 'auth'], function(){
//     Route::get('/', [ControllersBaseController::class, 'index']);
//     Route::get('dashboard', [ControllersBaseController::class, 'index']);
//     Route::resource('menu', MenuController::class);
//     Route::resource('transaksi', TransaksiController::class);
// });
