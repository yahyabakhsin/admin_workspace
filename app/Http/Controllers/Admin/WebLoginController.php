<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebLoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Mencoba melakukan login dan membuat sesi
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // Pastikan yang login adalah admin
            if ($user->role !== 'admin') {
                Auth::logout(); // Logout paksa jika bukan admin
                return back()->withErrors([
                    'email' => 'Akses ditolak. Akun ini bukan admin.',
                ]);
            }

            $request->session()->regenerate();

            // Redirect ke halaman admin setelah login berhasil
            return redirect()->intended('/admin');
        }

        // Jika gagal, kembalikan ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password yang diberikan salah.',
        ]);
    }
}
