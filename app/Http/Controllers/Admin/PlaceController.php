<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Menampilkan halaman utama admin dengan semua tempat.
     */
    public function index()
    {
        $places = Place::latest()->get();
        return view('admin.home', compact('places'));
    }

    /**
     * Menampilkan form untuk menambah tempat baru.
     */
    public function create()
    {
        return view('admin.add');
    }

    /**
     * Menyimpan tempat baru ke database.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'facilities' => 'required|string',
            'capacity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'open_time' => 'required|date_format:H:i',
            'close_time' => 'required|date_format:H:i|after:open_time',
        ]);

        Place::create($validatedData);

        return redirect()->route('admin.home')->with('success', 'Tempat berhasil ditambahkan');
    }

    /**
     * Menampilkan detail satu tempat.
     */
    public function show(Place $place)
    {
        return view('admin.places.show', compact('place'));
    }

    /**
     * Menampilkan form untuk mengedit tempat.
     * (METODE BARU)
     */
    public function edit(Place $place)
    {
        return view('admin.places.edit', compact('place'));
    }

    /**
     * Memperbarui data tempat di database.
     * (METODE BARU)
     */
    public function update(Request $request, Place $place)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'facilities' => 'required|string',
            'capacity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'open_time' => 'required|date_format:H:i',
            'close_time' => 'required|date_format:H:i|after:open_time',
        ]);

        $place->update($validatedData);

        return redirect()->route('admin.home')->with('success', 'Data tempat berhasil diperbarui.');
    }

    /**
     * Menghapus tempat.
     */
    public function destroy(Place $place)
    {
        $place->delete();
        return redirect()->route('admin.home')->with('success', 'Tempat berhasil dihapus');
    }
}
