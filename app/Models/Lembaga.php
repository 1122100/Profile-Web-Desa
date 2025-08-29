<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lembaga extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lembaga',
        'jenis_lembaga',
        'tahun_berdiri',
        'dusun_id',
        'alamat_detail',
        'latitude',
        'longitude',
        'foto',
    ];

    public function dusun()
    {
        return $this->belongsTo(Dusun::class);
    }
}