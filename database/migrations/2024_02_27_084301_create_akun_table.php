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
        Schema::create('akun', function (Blueprint $table) {
            $table->string('kode_akun', 50)->primary();
            $table->string('nama_akun', 255);
            $table->text('deskripsi')->nullable();
            $table->string('tipe_akun', 50)->nullable();
            $table->string('kategori_akun', 50)->nullable();
            $table->string('level_akun')->nullable(); // Use string method instead of varchar
            $table->timestamp('created_at')->default(now());
            $table->unique('kode_akun');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akun');
    }
};
