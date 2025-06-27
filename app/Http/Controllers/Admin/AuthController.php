<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password) || $user->role !== 'admin') {
        throw ValidationException::withMessages([
            'email' => ['Email atau password salah.'],
        ]);
    }

    // Hanya membuat token, tidak ada kode sesi di sini
    $token = $user->createToken('admin-token')->plainTextToken;

    return response()->json([
        'message' => 'Login sebagai admin berhasil!',
        'user' => $user,
        'token' => $token,
    ]);
}
    public function logout(Request $request)
    {
        // Logout dari API Token
        $request->user()->currentAccessToken()->delete();

        // Nanti Anda perlu menambahkan logout untuk sesi juga
        // Auth::guard('web')->logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();

        return response()->json(['message' => 'Logout berhasil']);
    }
}
