<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Place; // Kita akan buat model ini nanti
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Menampilkan semua data untuk API.
     */
    public function index()
    {
        // Mengambil semua data dari tabel 'places'
        return Place::all();
    }

    /**
     * Menyimpan data baru dari API atau Web.
     */
    public function store(Request $request)
    {
        // Validasi data yang masuk
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'facilities' => 'required|string',
            'capacity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'open_time' => 'required|date_format:H:i',
            'close_time' => 'required|date_format:H:i|after:open_time',
        ]);

        // Membuat record baru di database
        $place = Place::create($validatedData);

        // Mengembalikan data yang baru dibuat dengan status 201 Created
        return response()->json($place, 201);
    }

    /**
     * Menghapus data.
     */
    public function destroy(Place $place)
    {
        $place->delete();

        // Mengembalikan respons kosong dengan status 204 No Content
        return response()->noContent();
    }
}
