<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManajemenOutletController extends Controller
{
    //
    public function index(){
        return view('pages.toko.index');
    }

    public function create(){
        return view('pages.toko.create');
    }
}
