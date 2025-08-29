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
        Schema::create('peternakans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelompok');
            $table->string('ketua');
            $table->string('jenis_ternak');
            $table->integer('jumlah_ternak');
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
        Schema::dropIfExists('peternakans');
        // Schema::table('peternakans', function(Blueprint $table){
        //     $table->dropColumn(['latitude','longitude']);
        // });
        }
    };