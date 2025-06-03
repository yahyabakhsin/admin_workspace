<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $places = Http::get('http://127.0.0.1:8000/api/places')->json();
    return view('admin.home', compact('places')); // ini kunci pentingnya
});

Route::get('/add', fn() => view('admin.add'));

Route::post('/add', function (\Illuminate\Http\Request $request) {
    Http::post('http://127.0.0.1:8000/api/places', $request->all());
    return redirect('/')->with('success', 'Tempat ditambahkan');
});

Route::delete('/delete/{id}', function ($id) {
    Http::delete("http://127.0.0.1:8000/api/places/{$id}");
    return redirect('/')->with('success', 'Tempat dihapus');
});

Route::get('/bookings', function () {
    $bookings = Http::get('http://127.0.0.1:8000/api/bookings')->json();
    return view('admin.bookings', compact('bookings'));
});

Route::put('/bookings/{id}/status', function (\Illuminate\Http\Request $request, $id) {
    Http::put("http://127.0.0.1:8000/api/bookings/{$id}", [
        'status' => $request->input('status')
    ]);
    return redirect('/bookings')->with('success', 'Status booking diperbarui');
});

