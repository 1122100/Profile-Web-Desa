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
        Schema::create('pertanians', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelompok');
            $table->string('ketua');
            $table->string('jenis_tanaman');
            $table->decimal('luas_lahan', 10, 2); // in hectares
            $table->integer('jumlah_anggota');
            $table->foreignId('dusun_id')->constrained()->onDelete('cascade');
            $table->string('alamat_detail')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude',10, 7)->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertanians');
    }
};
