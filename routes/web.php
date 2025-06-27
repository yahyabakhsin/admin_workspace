<?php

use Illuminate\Http\Request;
use App\Models\Place;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\WebLoginController;
use App\Http\Controllers\Admin\PlaceController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\LogoutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- Rute Publik untuk Login ---
Route::get('/admin/login', fn() => view('admin.login'))->name('login');
Route::post('/admin/login', [WebLoginController::class, 'login']);

// --- Grup Route Admin yang Terproteksi Sesi ---
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {

    // Menggunakan Controller untuk Places
    Route::get('/', [PlaceController::class, 'index'])->name('home');
    Route::get('/add', [PlaceController::class, 'create'])->name('add');
    Route::post('/add', [PlaceController::class, 'store']);
    Route::get('/places/{place}', [PlaceController::class, 'show'])->name('places.show');
    Route::delete('/delete/{place}', [PlaceController::class, 'destroy'])->name('delete');

    // === DUA ROUTE BARU UNTUK FITUR EDIT DITAMBAHKAN DI SINI ===
    Route::get('/places/{place}/edit', [PlaceController::class, 'edit'])->name('places.edit');
    Route::put('/places/{place}', [PlaceController::class, 'update'])->name('places.update');

    // Menggunakan Controller untuk Bookings
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings');
    Route::put('/bookings/{booking}/status', [BookingController::class, 'updateStatus'])->name('bookings.status');

    // Route untuk Logout
    Route::post('/logout', LogoutController::class)->name('logout');
});

// Redirect dari root ke dashboard admin jika sudah login
Route::get('/', fn() => redirect('/admin'))->middleware('auth');
