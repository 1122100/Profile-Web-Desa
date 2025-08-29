<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peternakan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kelompok',
        'ketua',
        'jenis_ternak',
        'jumlah_ternak',
        'jumlah_anggota',
        'dusun_id',
        'alamat_detail',
        'latitude',
        'longitude',
        'deskripsi',
    ];

    public function dusun()
    {
        return $this->belongsTo(Dusun::class);
    }
}