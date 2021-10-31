<?php

namespace App\Http\Controllers;

use http\Client\Curl\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->role == "admin"){
            return redirect()->route('admin.index');
        } else if (auth()->user()->role == 'owner') {
            return redirect()->route('owner.home');
        } else if (auth()->user()->role == 'kasir') {
            return redirect()->route('cashier.home');
        } else {
            return redirect()->route('home');
        }
    }
}
