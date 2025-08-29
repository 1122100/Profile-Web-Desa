<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Dusun;
use App\Models\Lembaga;
use App\Models\Pertanian;
use App\Models\UMKM;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $content = view('sitemap.index', [
            'beritas' => Berita::where('is_published', true)->latest()->get(),
            'dusuns' => Dusun::all(),
            'lembagas' => Lembaga::all(),
            'pertanians' => Pertanian::all(),
            'umkms' => UMKM::all(),
        ]);

        return response($content, 200)
            ->header('Content-Type', 'text/xml');
    }
}