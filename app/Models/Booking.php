<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    // Menjaga agar semua kolom bisa diisi
    protected $guarded = [];

    /**
     * Mendefinisikan relasi: Setiap Booking dimiliki oleh satu Place.
     */
    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}

