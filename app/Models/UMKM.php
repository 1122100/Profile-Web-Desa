<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UMKM extends Model
{
    use HasFactory;

    protected $table = 'umkms';
    protected $fillable = [
        'nama_usaha',
        'foto',
        'pemilik',
        'jenis_usaha',
        'tahun_berdiri',
        'jumlah_karyawan',
        'dusun_id',
        'alamat',
        'latitude',
        'longitude',
        'kontak',
        'deskripsi',
        
    ];

    public function dusun()
    {
        return $this->belongsTo(Dusun::class);
    }
}
