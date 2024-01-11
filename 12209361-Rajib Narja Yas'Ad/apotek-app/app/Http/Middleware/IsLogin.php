<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            // kalo auth sudah mendeteksi ada riwayat login, maka dibolehkan akses route terkait
            return $next($request);
        }else {
            // kalo gk ada, diarahkan ke halaman login
            return redirect()->route('login')->with('failed', 'Anda belom login');
        }
    }
}
