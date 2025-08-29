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
        Schema::create('desas', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->float('luas_wilayah')->nullable();
            $table->string('alamat')->nullable();
            $table->string('email')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('logo')->nullable();
            $table->string('foto')->nullable();
            $table->string('kepala_desa')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desas');
    }
};