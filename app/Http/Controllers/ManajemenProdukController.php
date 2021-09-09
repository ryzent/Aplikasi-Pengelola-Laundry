<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManajemenProdukController extends Controller
{
    //
    public function index(){
        return view('pages.produk.index');
    }

    public function create(){
        return view('pages.produk.create');
    }
}
