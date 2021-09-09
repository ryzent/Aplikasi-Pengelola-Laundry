<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManajemenPelangganController extends Controller
{
    //
    public function index(){
        return view('pages.pelanggan.index');
    }

    public function create(){
        return view('pages.pelanggan.create');
    }
}
