<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
use App\Http\Controllers\RiwayatTransaksi;
use App\Http\Controllers\VoucherController;
use App\Models\Transaksi;

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


    Route::prefix('superadmin')
    ->middleware('auth')
    ->group(function(){
        Route::get('/', [AdminController::class, 'index'])->name('sadmin.index');

        Route::get('manajemen_pelanggan/get/{id}', [ManajemenPelangganController::class, 'get']);
        Route::get('manajemen_pelanggan/json', [ManajemenPelangganController::class, 'json']);
        Route::get('manajemen_pelanggan/destroy/{id}', [ManajemenPelangganController::class, 'destroy']);
        Route::resource('manajemen_pelanggan', ManajemenPelangganController::class);

        Route::get('manajemen_outlet/json', [ManajemenOutletController::class, 'json']);
        Route::get('manajemen_outlet/destroy/{id}',[ManajemenOutletController::class, 'destroy']);
        Route::resource('manajemen_outlet', ManajemenOutletController::class);

        Route::get('manajemen_produk/json', [ManajemenProdukController::class, 'json']);
        Route::get('manajemen_produk/get', [ManajemenProdukController::class, 'getSatuan']);
        Route::get('manajemen_produk/destroy/{id}', [ManajemenProdukController::class, 'destroy']);
        Route::resource('manajemen_produk', ManajemenProdukController::class);

        Route::get('manajemen_pegawai/json', [ManajemenPegawaiController::class, 'json']);
        Route::get('manajemen_pegawai/destroy/{id}', [ManajemenPegawaiController::class, 'destroy']);
        Route::resource('manajemen_pegawai', ManajemenPegawaiController::class);

        Route::get('transaksi/json', [TransaksiController::class, 'json']);
        Route::resource('transaksi', TransaksiController::class);
        Route::resource('laporan', LaporanController::class);
        Route::resource('voucher', VoucherController::class);
    });

    Route::prefix('admin')
    ->middleware('auth')
    ->group(function(){
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');

        Route::resource('transaksi', TransaksiController::class);
        Route::resource('laporan', LaporanController::class);
        Route::resource('voucher', VoucherController::class);

        Route::get('manajemen_pelanggan/json', [ManajemenPelangganController::class, 'json']);
        Route::get('manajemen_pelanggan/destroy/{id}', [ManajemenPelangganController::class, 'destroy']);
        Route::resource('manajemen_pelanggan', ManajemenPelangganController::class);

        Route::get('manajemen_outlet/json', [ManajemenOutletController::class, 'json']);
        Route::get('manajemen_outlet/destroy/{id}',[ManajemenOutletController::class, 'destroy']);
        Route::resource('manajemen_outlet', ManajemenOutletController::class);

        Route::get('manajemen_produk/json', [ManajemenProdukController::class, 'json']);
        Route::get('manajemen_produk/destroy/{id}', [ManajemenProdukController::class, 'destroy']);
        Route::resource('manajemen_produk', ManajemenProdukController::class);

        Route::get('manajemen_pegawai/json', [ManajemenPegawaiController::class, 'json']);
        Route::get('manajemen_pegawai/destroy/{id}', [ManajemenPegawaiController::class, 'destroy']);
        Route::resource('manajemen_pegawai', ManajemenPegawaiController::class);


    });





Route::prefix('kasir')
->middleware('auth')
->group(function(){
    Route::get('/', [KasirController::class, 'index'])->name('cashier.home');
    Route::get('manajemen_pelanggan/get/{id}', [ManajemenPelangganController::class, 'get']);
    Route::get('manajemen_pelanggan/json', [ManajemenPelangganController::class, 'json']);
    Route::get('manajemen_pelanggan/destroy/{id}', [ManajemenPelangganController::class, 'destroy']);
    Route::resource('manajemen_pelanggan', ManajemenPelangganController::class);
    //Route::post('transaksi/store-transaksi', [TransaksiController::class, 'storeTransaksi']);
    Route::resource('transaksi', TransaksiController::class);
    Route::get('riwayat-transaksi/delete/{id}', [RiwayatTransaksi::class, 'destroy']);
    Route::post('riwayat-transaksi/update-status', [RiwayatTransaksi::class, 'updateStatus']);
    Route::post('riwayat-transaksi/bayar-transaksi', [RiwayatTransaksi::class, 'bayarTransaksi']);
    Route::resource('riwayat-transaksi', RiwayatTransaksi::class);
    Route::resource('laporan', LaporanController::class);
});

Route::prefix('pemilik')
->middleware('auth')
->group(function(){
        Route::get('/', [OwnerController::class, 'index'])->name('owner.home');
        Route::resource('laporan', LaporanController::class);
});
