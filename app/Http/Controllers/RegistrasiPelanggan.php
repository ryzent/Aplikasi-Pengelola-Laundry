<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrasiPelanggan extends Controller
{
    //
    public function index(){
        return view('admin.registrasi_pelanggan');
    }
}
