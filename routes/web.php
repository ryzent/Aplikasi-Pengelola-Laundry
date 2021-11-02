<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ManajemenOutletController;
use App\Http\Controllers\ManajemenPelangganController;
use App\Http\Controllers\ManajemenProdukController;
use App\Http\Controllers\ManajemenPegawaiController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;

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

Route::get('home', [HomeController::class, 'index']);

if( empty(auth()->user()->role) ){

        Route::prefix('admin')
        ->middleware('admin')
        ->group(function(){
            Route::get('/', [AdminController::class, 'index'])->name('admin.index');
            //Route::get('index', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.home');

            // Route::get('manajemen_pelanggan', [App\Http\Controllers\ManajemenPelangganController::class, 'index']);
            // Route::get('manajemen_pelanggan/create', [App\Http\Controllers\ManajemenPelangganController::class, 'create']);
            Route::get('manajemen_pelanggan/json', [ManajemenPelangganController::class, 'json']);
            Route::get('manajemen_pelanggan/destroy/{id}', [ManajemenPelangganController::class, 'destroy']);
            Route::resource('manajemen_pelanggan', ManajemenPelangganController::class);

            // Route::get('manajemen_outlet', [App\Http\Controllers\ManajemenOutletController::class, 'index']);
            // Route::get('manajemen_outlet/create', [App\Http\Controllers\ManajemenOutletController::class, 'create']);
            Route::get('manajemen_outlet/json', [ManajemenOutletController::class, 'json']);
            Route::get('manajemen_outlet/destroy/{id}',[ManajemenOutletController::class, 'destroy']);
            Route::resource('manajemen_outlet', ManajemenOutletController::class);

            // Route::get('manajemen_produk', [App\Http\Controllers\ManajemenProdukController::class, 'index']);
            // Route::get('manajemen_produk/create', [App\Http\Controllers\ManajemenProdukController::class, 'create']);
            Route::get('manajemen_produk/json', [ManajemenProdukController::class, 'json']);
            Route::get('manajemen_produk/destroy/{id}', [ManajemenProdukController::class, 'destroy']);
            Route::resource('manajemen_produk', ManajemenProdukController::class);

            // Route::get('manajemen_pegawai', [App\Http\Controllers\ManajemenPegawaiController::class, 'index']);
            // Route::get('manajemen_pegawai/create', [App\Http\Controllers\ManajemenPegawaiController::class, 'create']);
            Route::get('manajemen_pegawai/json', [ManajemenPegawaiController::class, 'json']);
            Route::get('manajemen_pegawai/destroy/{id}', [ManajemenPegawaiController::class, 'destroy']);
            Route::resource('manajemen_pegawai', ManajemenPegawaiController::class);

            Route::resource('transaksi', TransaksiController::class);
            Route::resource('laporan', LaporanController::class);
        });


}
if( ! empty(auth()->user()->role) == 0){
    Route::prefix('kasir')
    ->middleware('cashier')
    ->group(function(){
        Route::get('/', [KasirController::class, 'index'])->name('cashier.home');
        Route::get('manajemen_pelanggan/json', [ManajemenPelangganController::class, 'json']);
        Route::get('manajemen_pelanggan/destroy/{id}', [ManajemenPelangganController::class, 'destroy']);
        Route::resource('manajemen_pelanggan', ManajemenPelangganController::class);
        Route::resource('transaksi', TransaksiController::class);
        Route::resource('laporan', LaporanController::class);
    });
}

if( ! empty(auth()->user()->role) == 0){
    Route::prefix('pemilik')
    ->middleware('owner')
    ->group(function(){
            Route::get('/', [OwnerController::class, 'index'])->name('owner.home');
            Route::resource('laporan', LaporanController::class);
    });
}




