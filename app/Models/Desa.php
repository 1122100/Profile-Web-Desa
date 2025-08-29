<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;

    protected $table = 'desas';

    protected $fillable = [
        'nama',
        'visi',
        'misi',
        'luas_wilayah',
        'alamat',
        'email',
        'kode_pos',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'logo',
        'foto',
        'kepala_desa',
        'latitude',
        'longitude',
    ];
}
