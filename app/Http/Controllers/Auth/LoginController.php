<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $req){
        $input = $req->all();
        $this->validate($req,[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if(Auth::check() && Auth::user()->role == 1) {
                return redirect()->route('sadmin.index');
            }  else if(Auth::check() && Auth::user()->role == 2){
                return redirect()->route('admin.index');
            }else if (Auth::check() && Auth::user()->role == 3) {
                return redirect()->route('owner.home');
            } else if (Auth::check() && Auth::user()->role == 4) {
                return redirect()->route('cashier.home');
            } else {
                return redirect()->route('/');
            }

        } else{
            Alert::error('Error','Gagal Masuk!');
            return redirect()->route('login');
        }
    }
}
