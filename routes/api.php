<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Api\PlaceController; // <-- Import controller baru

// Endpoint login untuk API
Route::post('/admin/login', [AuthController::class, 'login']);

// Grup API terproteksi
Route::middleware('auth:sanctum')->group(function () {
    // Mengembalikan user yang terautentikasi
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Endpoint untuk resource 'places'
    Route::get('/places', [PlaceController::class, 'index']);
    Route::post('/places', [PlaceController::class, 'store']);
    Route::delete('/places/{place}', [PlaceController::class, 'destroy']);

    // Anda bisa menambahkan route API lain di sini (misal: /bookings)
});

