<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class OnlyGuest
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response {
        
        if (Auth::check()) {
        // ✅ Redirect sesuai role
        if (Auth::user()->role_id == 1) {
            return redirect('/dashboard'); // admin → dashboard
        }
        return redirect('/profile'); // user biasa → profile
        }
        return $next($request);
        // if (Auth::user()) { 
        //     return redirect('/');
        // }
        // return $next($request);
    }
}
