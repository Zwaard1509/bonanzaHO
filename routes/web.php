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

Route::get('/', [ControllersBaseController::class, 'index']);
Route::get('dashboard', [ControllersBaseController::class, 'index']);
//route kategori
Route::resource('kategori', KategoriController::class);
Route::get('excel-kategori', [KategoriController::class, 'exportData'])->name('export-kategori');
Route::post('Kategori/import', [KategoriController::class, 'importData'])->name('import-kategori');
//route jenis
Route::resource('jenis', JenisController::class);
//route menu
Route::resource('menu', MenuController::class);
//route stok
Route::resource('stok', StokController::class);
//route pelanggan
Route::resource('pelanggan', PelangganController::class);
//route karyawan
Route::resource('karyawan', KaryawanController::class);
Route::put('/karyawan/{id}', 'KaryawanController@update')->name('karyawan.index');
Route::resource('meja', MejaController::class);
Route::resource('pemesanan', PemesananController::class);
Route::resource('transaksi', TransaksiController::class);
Route::get('nota/{noFaktur}', [TransaksiController::class, 'faktur']);
Route::get('detailtransaksi', [DetailTransaksiController::class, 'index']);
Route::get('about', [AboutController::class, 'index']);
// route produk titipan
Route::resource('produktitipan', ProdukTitipanController::class);
Route::get('excel-produktitipan', [ProdukTitipanController::class, 'exportData'])->name('export-produktitipan');
Route::post('produktitipan/import', [ProduktitipanController::class, 'importData'])->name('import-produktitipan');

