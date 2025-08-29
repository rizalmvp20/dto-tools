<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApprovedMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Kalau belum login, lempar ke login
        if (!auth()->check()) {
            return redirect()->route('login.show');
        }

        // Kalau user belum di-approve, arahkan ke halaman pending
        if (!auth()->user()->is_approved) {
            auth()->logout(); // paksa logout biar tidak nyangkut session
            return redirect()->route('pending')
                ->with('status', 'Akun kamu belum di-approve. Hubungi admin dulu ya.');
        }

        return $next($request);
    }
}
