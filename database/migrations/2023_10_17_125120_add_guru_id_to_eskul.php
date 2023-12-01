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
        Schema::table('eskul', function (Blueprint $table) {
            $table->unsignedBigInteger('guru_id')->nullable(); // Tambahkan kolom guru_id
            $table->foreign('guru_id')->references('id')->on('users'); // Menambahkan foreign key ke tabel users
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('eskul', function (Blueprint $table) {
            $table->dropForeign(['guru_id']); // Hapus kunci asing
            $table->dropColumn('guru_id'); // Hapus kolom guru_id
        });
    }
};
