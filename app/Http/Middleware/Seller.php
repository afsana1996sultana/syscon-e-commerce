<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Seller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->guest('/login');
        }
        if (Auth::user()->role_id == 2) {
            return $next($request);
        }
        if (Auth::user()->role_id == 3) {
            return redirect('/');
        }
        if (Auth::user()->role_id == 1) {
            return redirect('dashboard');
        }
    }
}
