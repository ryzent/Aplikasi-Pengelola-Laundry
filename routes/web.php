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

Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home')->middleware('admin');

Route::get('owner/home', [App\Http\Controllers\HomeController::class, 'owner'])->name('owner.home')->middleware('owner');

Route::get('cashier/home', [App\Http\Controllers\HomeController::class, 'cashier'])->name('cashier.home')->middleware('cashier');

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/registrasi_pelanggan', [App\Http\Controllers\RegistrasiPelanggan::class, 'index']);