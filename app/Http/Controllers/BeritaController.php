<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource for users.
     */
    public function index()
    {
        $beritas = Berita::where('is_published', true)
            ->orderBy('published_at', 'desc')
            ->paginate(6);

        return view('users.berita', compact('beritas'));
    }

    /**
     * Display a listing of the resource for admin.
     */
    public function adminIndex()
    {
        $beritas = Berita::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.berita.index', compact('beritas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_published' => 'boolean',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['slug'] = Str::slug($request->judul);

        if ($request->is_published) {
            $data['published_at'] = now();
        }

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->storeAs('public/berita', $gambarName);
            $data['gambar'] = 'berita/' . $gambarName;
        }

        Berita::create($data);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)
                    ->where('is_published', true)
                    ->firstOrFail();
    
        // Get recent news excluding current one
        $recentBeritas = Berita::where('id', '!=', $berita->id)
                              ->where('is_published', true)
                              ->latest()
                              ->take(3)
                              ->get();
    
        // SEO metadata
        $title = $berita->judul . ' - ' . config('app.name');
        $description = Str::limit(strip_tags($berita->konten), 160);
        $keywords = 'berita desa, ' . $berita->judul . ', informasi desa';
        $ogImage = $berita->gambar ? Storage::url($berita->gambar) : null;
    
        return view('users.berita-detail', compact(
            'berita', 
            'recentBeritas',
            'title',
            'description',
            'keywords',
            'ogImage'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $beritum)
    {
        return view('admin.berita.edit', compact('beritum'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berita $beritum)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_published' => 'boolean',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->judul);

        // Handle published status change
        if ($request->is_published && !$beritum->is_published) {
            $data['published_at'] = now();
        }

        if ($request->hasFile('gambar')) {
            // Delete old image if exists
            if ($beritum->gambar) {
                Storage::delete('public/' . $beritum->gambar);
            }

            $gambar = $request->file('gambar');
            $gambarName = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->storeAs('public/berita', $gambarName);
            $data['gambar'] = 'berita/' . $gambarName;
        }

        $beritum->update($data);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $beritum)
    {
        // Delete image if exists
        if ($beritum->gambar) {
            Storage::delete('public/' . $beritum->gambar);
        }

        $beritum->delete();

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus!');
    }
}
