<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class RoleOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        return $next($request);
        // if(Auth::check() && Auth::user()->role == 4){
        //     return $next($request);
        // } else {

        //     Alert::error('Error', 'Invalid request!');
        //     return redirect()->route('login');
        // }
    }
}
