<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'gambar',
        'user_id',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function user (){
        return $this->belongsTo(User::class);
    }

    protected static function boot(){
        parent::boot();

        static::creating(function($berita) {
            if (!$berita->slug){
                $berita->slug = Str::slug($berita->judul);
            }
        });
    }

    public function getExcerptAttribute(){
        return Str::limit (strip_tags($this->konten),150);
    }
}
