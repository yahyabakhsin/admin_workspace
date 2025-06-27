<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking; // Import model Booking
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Menampilkan daftar semua booking.
     */
    public function index()
    {
        // Ambil semua data booking dari database, urutkan dari yang terbaru.
        // 'with('place')' akan ikut mengambil data tempat yang berelasi.
        $bookings = Booking::with('place')->latest()->get();

        // Tampilkan view 'admin.bookings' dan kirim data $bookings ke dalamnya.
        return view('admin.bookings', compact('bookings'));
    }

    /**
     * Memperbarui status booking (misal: dari 'pending' menjadi 'approved').
     */
    public function updateStatus(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $booking->status = $request->status;
        $booking->save();

        return back()->with('success', 'Status booking berhasil diperbarui.');
    }
}
