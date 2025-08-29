<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dusun extends Model
{
    use HasFactory;

    protected $table = 'dusuns';

    protected $fillable = [
        'nama',
        'foto',
        'kepala_dusun',
        'jumlah_penduduk',
        'luas_wilayah',
        'batas_wilayah',
    ];

    // Define relationship with Pertanian
    public function pertanians()
    {
        return $this->hasMany(Pertanian::class);
    }

    // Define relationship with Peternakan
    public function peternakans()
    {
        return $this->hasMany(Peternakan::class);
    }

    // Define relationship with UMKM
    public function umkms()
    {
        return $this->hasMany(UMKM::class);
    }

    // Define relationship with Lembaga
    public function lembagas()
    {
        return $this->hasMany(Lembaga::class);
    }
}
