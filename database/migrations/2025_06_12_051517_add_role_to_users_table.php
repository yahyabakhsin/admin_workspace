<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::table('users', function (Blueprint $table) {
        // TAMBAHKAN BARIS INI
        // Ini akan membuat kolom 'role' setelah kolom 'password'
        $table->string('role')->default('user')->after('password');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        // TAMBAHKAN BARIS INI
        // Untuk menghapus kolom jika migrasi dibatalkan
        $table->dropColumn('role');
    });
}
};
