<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CekLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user sudah login (ada session-nya)
        if (!Auth::check()) {
            return redirect('/login'); // jika belum login, redirect ke halaman login
        }
        
        return $next($request); // jika sudah login, lanjutkan ke halaman yang dituju
    }
}
