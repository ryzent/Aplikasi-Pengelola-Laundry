<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManajemenOutlet extends Controller
{
    //
    public function index(){
        return view('admin.manajemen_outlet');
    }
}
