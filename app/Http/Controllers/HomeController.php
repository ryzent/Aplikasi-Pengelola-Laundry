<?php

namespace App\Http\Controllers;

use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if(Auth::check() && Auth::user()->role == 1){
            return redirect()->route('sadmin.index');
        } else if(Auth::check() && Auth::user()->role == 2){
            return redirect()->route('admin.index');
        }else if (Auth::check() && Auth::user()->role == 3) {
            return redirect()->route('4');
        } else if (Auth::check() && Auth::user()->role == 4) {
            return redirect()->route('3');
        } else {
            return redirect()->route('home');
        }
    }
}
