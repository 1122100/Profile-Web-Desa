<?php

namespace App\Http\Controllers;

use App\Models\Dusun;
use App\Models\Peternakan;
use Illuminate\Http\Request;

class PeternakanController extends Controller
{
    /**
     * Display a listing of the admin.peternakan.
     */
    public function index()
    {
        $peternakans = Peternakan::all();
        return view('admin.peternakan.index', compact('peternakans'));
    }

    /**
     * Show the form for creating a new admin.peternakan.
     */
    public function create()
    {
        $dusuns =Dusun::all();
        return view('admin.peternakan.create', compact('dusuns'));
    }

    /**
     * Store a newly created peternakan in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelompok' => 'required|string|max:255',
            'ketua' => 'required|string|max:255',
            'jenis_ternak' => 'required|string|max:255',
            'jumlah_ternak' => 'required|integer',
            'jumlah_anggota' => 'required|integer',
            'dusun_id' => 'required|exists:dusuns,id',
            'alamat_detail' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'deskripsi' => 'nullable|string',
        ]);

        Peternakan::create($request->all());

        return redirect()->route('admin.peternakan.index')
            ->with('success', 'Kelompok peternakan berhasil ditambahkan.');
    }

    /**
     * Display the specified admin.peternakan.
     */
    public function show(Peternakan $peternakan)
    {
        return view('admin.peternakan.show', compact('peternakan'));
    }

    /**
     * Show the form for editing the specified admin.peternakan.
     */
    public function edit(Peternakan $peternakan)
    {
        $dusuns = Dusun::all();
        return view('admin.peternakan.edit', compact('peternakan', 'dusuns'));
    }

    /**
     * Update the specified peternakan in storage.
     */
    public function update(Request $request, Peternakan $peternakan)
    {
        $request->validate([
            'nama_kelompok' => 'required|string|max:255',
            'ketua' => 'required|string|max:255',
            'jenis_ternak' => 'required|string|max:255',
            'jumlah_ternak' => 'required|integer',
            'jumlah_anggota' => 'required|integer',
            'dusun_id' => 'required|exists:dusuns,id',
            'alamat_detail' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'deskripsi' => 'nullable|string',
        ]);

        $peternakan->update($request->all());

        return redirect()->route('admin.peternakan.index')
            ->with('success', 'Kelompok peternakan berhasil diperbarui.');
    }

    /**
     * Remove the specified peternakan from storage.
     */
    public function destroy(Peternakan $peternakan)
    {
        $peternakan->delete();

        return redirect()->route('admin.peternakan.index')
            ->with('success', 'Kelompok peternakan berhasil dihapus.');
    }
}