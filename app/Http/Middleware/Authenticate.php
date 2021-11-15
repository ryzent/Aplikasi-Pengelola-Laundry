<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
        if(Auth::check() && Auth::user()->role == 1){
            return route('sadmin.index');
        }

        if(Auth::check() && Auth::user()->role == 2){
            return route('admin.index');
        }

        if(Auth::check() && Auth::user()->role == 3){
            return route('cashier.home');
        }

        if(Auth::check() && Auth::user()->role == 4){
            return route('owner.home');
        }
    }
}
