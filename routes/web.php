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

Route::get('admin/index', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home')->middleware('admin');

Route::get('owner/index', [App\Http\Controllers\HomeController::class, 'owner'])->name('owner.home')->middleware('owner');

Route::get('cashier/index', [App\Http\Controllers\HomeController::class, 'cashier'])->name('cashier.home')->middleware('cashier');

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/manajemen_pelanggan', [App\Http\Controllers\ManajemenPelangganController::class, 'index']);
Route::get('/manajemen_outlet', [App\Http\Controllers\ManajemenOutletController::class, 'index']);
Route::get('/manajemen_produk', [App\Http\Controllers\ManajemenProdukController::class, 'index']);
Route::get('/manajemen_pegawai', [App\Http\Controllers\ManajemenPegawaiController::class, 'index']);
Route::get('/transaksi', [App\Http\Controllers\TransaksiController::class, 'index']);
Route::get('/laporan', [App\Http\Controllers\LaporanController::class, 'index']);
