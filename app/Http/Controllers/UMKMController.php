<?php

namespace App\Http\Controllers;

use App\Models\UMKM;
use Illuminate\Http\Request;

class UMKMController extends Controller
{
    /**
     * Display a listing of the admin.UMKM.
     */
    public function index()
    {
        $umkms = UMKM::all();
        return view('admin.umkm.index', compact('umkms'));
    }

    /**
     * Show the form for creating a new admin.UMKM.
     */
    public function create()
    {
        $dusuns = \App\Models\Dusun::all();
        return view('admin.umkm.create', compact('dusuns'));
    }


    /**
     * Store a newly created UMKM in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_usaha' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:8048',
            'pemilik' => 'required|string|max:255',
            'jenis_usaha' => 'required|string|max:255',
            'dusun_id' => 'required|exists:dusuns,id',
            'alamat' => 'required|string|max:255',
            'tahun_berdiri' => 'required|integer',
            'jumlah_karyawan' => 'required|integer',
            'deskripsi' => 'nullable|string',
            'kontak' => 'nullable|string|max:255',
        ]);

        $path = null;
        if($request->hasfile('foto')){
            $path = $request->file('foto')->store('umkm_foto','public');
        }
        UMKM::create([
            'nama_usaha' => $request->nama_usaha,
            'foto' => $path,
            'pemilik' => $request->pemilik,
            'jenis_usaha' => $request->jenis_usaha,
            'dusun_id' => $request->dusun_id,
            'alamat' => $request->alamat,
            'tahun_berdiri' => $request->tahun_berdiri,
            'jumlah_karyawan' => $request->jumlah_karyawan,
            'deskripsi' => $request->deskripsi,
            'kontak' => $request->kontak,
        ]);

        return redirect()->route('admin.umkm.index')
            ->with('success', 'UMKM berhasil ditambahkan.');
    }

    /**
     * Display the specified admin.UMKM.
     */
    public function show(UMKM $umkm)
    {
        return view('admin.umkm.show', compact('umkm'));
    }

    /**
     * Show the form for editing the specified admin.UMKM.
     */
    public function edit(UMKM $umkm)
    {
        $dusuns = \App\Models\Dusun::all();
        return view('admin.umkm.edit', compact('umkm', 'dusuns'));
    }

    /**
     * Update the specified UMKM in storage.
     */
    public function update(Request $request, UMKM $umkm)
    {
        $request->validate([
            'nama_usaha' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:8048',
            'pemilik' => 'required|string|max:255',
            'jenis_usaha' => 'required|string|max:255',
            'dusun_id' => 'required|exists:dusuns,id',
            'alamat' => 'required|string|max:255',
            'tahun_berdiri' => 'required|integer',
            'jumlah_karyawan' => 'required|integer',
            'deskripsi' => 'nullable|string',
            'kontak' => 'nullable|string|max:255',
        ]);

        $data = $request->all();

    // Jika ada file foto baru, upload dan ganti yang lama
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('umkm_foto', 'public');
            $data['foto'] = $path;
        }
        $umkm->update($data);

        return redirect()->route('admin.umkm.index')
            ->with('success', 'UMKM berhasil diperbarui.');
    }

    /**
     * Remove the specified UMKM from storage.
     */
    public function destroy(UMKM $umkm)
    {
        $umkm->delete();

        return redirect()->route('admin.umkm.index')
            ->with('success', 'UMKM berhasil dihapus.');
    }
}
