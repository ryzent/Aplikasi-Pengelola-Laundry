<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RoleCashier
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
        if(! empty(auth()->user()->role) == 'kasir'){
            return $next($request);
        } else {

            Alert::error('Error', 'Invalid request!');
            return redirect()->route('login');
        }
    }
}
