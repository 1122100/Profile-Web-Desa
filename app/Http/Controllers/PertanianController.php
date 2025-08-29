<?php

namespace App\Http\Controllers;

use App\Models\Dusun;
use App\Models\Pertanian;
use Illuminate\Http\Request;

class PertanianController extends Controller
{
    /**
     * Display a listing of the pertanian.
     */
    public function index()
    {
        $pertanians = Pertanian::all();
        return view('admin.pertanian.index', compact('pertanians'));
    }

    /**
     * Show the form for creating a new pertanian.
     */
    public function create()
    {
        $dusuns =Dusun::all();
        return view('admin.pertanian.create', compact('dusuns'));
    }

    /**
     * Store a newly created pertanian in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelompok' => 'required|string|max:255',
            'ketua' => 'required|string|max:255',
            'jenis_tanaman' => 'required|string|max:255',
            'luas_lahan' => 'required|numeric',
            'jumlah_anggota' => 'required|integer',
            'dusun_id' => 'nullable|exists:dusuns,id',
            'alamat_detail' => 'nullable|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'deskripsi' => 'nullable|string',
        ]);

        Pertanian::create($request->all());

        return redirect()->route('admin.pertanian.index')
            ->with('success', 'Kelompok tani berhasil ditambahkan.');
    }

    /**
     * Display the specified pertanian.
     */
    public function show(Pertanian $pertanian)
    {
        $pertanian->load('dusun');
        return view('admin.pertanian.show', compact('pertanian'));
    }

    /**
     * Show the form for editing the specified pertanian.
     */
    public function edit(Pertanian $pertanian)
    {
        $dusuns = Dusun::all(); //
        return view('admin.pertanian.edit', compact('pertanian','dusuns'));
    }

    /**
     * Update the specified pertanian in storage.
     */
    public function update(Request $request, Pertanian $pertanian)
    {
        $request->validate([
            'nama_kelompok' => 'required|string|max:255',
            'ketua' => 'required|string|max:255',
            'jenis_tanaman' => 'required|string|max:255',
            'luas_lahan' => 'required|numeric',
            'jumlah_anggota' => 'required|integer',
            'alamat_detail' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'deskripsi' => 'nullable|string',
        ]);

        $pertanian->update($request->all());

        return redirect()->route('admin.pertanian.index')
            ->with('success', 'Kelompok tani berhasil diperbarui.');
    }

    /**
     * Remove the specified pertanian from storage.
     */
    public function destroy(Pertanian $pertanian)
    {
        $pertanian->delete();

        return redirect()->route('admin.pertanian.index')
            ->with('success', 'Kelompok tani berhasil dihapus.');
    }
}
