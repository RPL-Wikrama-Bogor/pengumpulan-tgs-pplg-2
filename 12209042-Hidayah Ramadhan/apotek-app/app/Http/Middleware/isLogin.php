<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isLogin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            //kalau auth sudah mendeteksi ada riwayat login,maka dibolehkan akses route
            return $next($request);
        }else {
            //kalau gaada, diarahkan ke halaman login balik
            return redirect()->route('login')->with('failed','Anda belum login!');
        }
    }
}
