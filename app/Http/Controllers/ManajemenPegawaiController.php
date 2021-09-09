<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManajemenPegawaiController extends Controller
{
    //
    public function index(){
        return view('pages.pegawai.index');
    }

    public function create(){
        return view('pages.pegawai.create');
    }
}
