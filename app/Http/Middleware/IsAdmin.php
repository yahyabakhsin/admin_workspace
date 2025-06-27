<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user login DAN rolenya adalah 'admin'
        if (Auth::check() && Auth::user()->role == 'admin') {
            return $next($request); // Izinkan masuk
        }

        // Jika tidak, tolak dengan pesan error
        return response()->json(['message' => 'Akses Ditolak. Hanya Untuk Admin.'], 403);
    }
}
