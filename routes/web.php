<?php

use App\Http\Controllers\ManajemenOutletController;
use App\Http\Controllers\ManajemenPelangganController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManajemenProdukController;
use App\Http\Controllers\ManajemenPegawaiController;

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

Route::get('admin/index', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.home')->middleware('admin');

Route::get('owner/index', [App\Http\Controllers\OwnerController::class, 'index'])->name('owner.home')->middleware('owner');

Route::get('cashier/index', [App\Http\Controllers\KasirController::class, 'index'])->name('cashier.home')->middleware('cashier');

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('manajemen_pelanggan', [App\Http\Controllers\ManajemenPelangganController::class, 'index']);
// Route::get('manajemen_pelanggan/create', [App\Http\Controllers\ManajemenPelangganController::class, 'create']);
Route::resource('manajemen_pelanggan', ManajemenPelangganController::class);

// Route::get('manajemen_outlet', [App\Http\Controllers\ManajemenOutletController::class, 'index']);
// Route::get('manajemen_outlet/create', [App\Http\Controllers\ManajemenOutletController::class, 'create']);
Route::resource('manajemen_outlet', ManajemenOutletController::class);

// Route::get('manajemen_produk', [App\Http\Controllers\ManajemenProdukController::class, 'index']);
// Route::get('manajemen_produk/create', [App\Http\Controllers\ManajemenProdukController::class, 'create']);
Route::resource('manajemen_produk', ManajemenProdukController::class);

// Route::get('manajemen_pegawai', [App\Http\Controllers\ManajemenPegawaiController::class, 'index']);
// Route::get('manajemen_pegawai/create', [App\Http\Controllers\ManajemenPegawaiController::class, 'create']);
Route::resource('manajemen_pegawai', ManajemenPegawaiController::class);


Route::get('transaksi', [App\Http\Controllers\TransaksiController::class, 'index']);
Route::get('laporan', [App\Http\Controllers\LaporanController::class, 'index']);
