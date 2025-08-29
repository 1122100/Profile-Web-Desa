<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DesaController extends Controller
{
    public function index()
    {
        $desas = Desa::all();
        return view('admin.desa.index', compact('desas'));
    }

    public function create()
    {
        return view('admin.desa.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'         => 'required|string|max:255',
            'visi'         => 'nullable|string',
            'misi'         => 'nullable|string',
            'luas_wilayah' => 'nullable|string|max:255',
            'alamat'       => 'nullable|string|max:255',
            'email'        => 'nullable|email|max:255',
            'kode_pos'     => 'nullable|string|max:10',
            'kecamatan'    => 'nullable|string|max:255',
            'kabupaten'    => 'nullable|string|max:255',
            'provinsi'     => 'nullable|string|max:255',
            'logo'         => 'nullable|image|mimes:jpeg,png,jpg|max:10240', // 10 MB
            'foto'         => 'nullable|image|mimes:jpeg,png,jpg|max:10240', // 10 MB
            'kepala_desa'  => 'nullable|string|max:255',
            'latitude'     => 'nullable|numeric|between:-90,90',
            'longitude'    => 'nullable|numeric|between:-180,180',
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('logos', 'public');
        }
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('fotos', 'public');
        }

        Desa::create($validated);

        return redirect()->route('admin.desa.index')->with('success', 'Data desa berhasil ditambahkan.');
    }

    public function show(Desa $desa)
    {
        return view('admin.desa.show', compact('desa'));
    }

    public function edit(Desa $desa)
    {
        return view('admin.desa.edit', compact('desa')); // perbaikan: 'desa', bukan 'desas'
    }

    public function update(Request $request, Desa $desa)
    {
        $validated = $request->validate([
            'nama'         => 'required|string|max:255',
            'visi'         => 'nullable|string',
            'misi'         => 'nullable|string',
            'luas_wilayah' => 'nullable|string|max:255',
            'alamat'       => 'nullable|string|max:255',
            'email'        => 'nullable|email|max:255',
            'kode_pos'     => 'nullable|string|max:10',
            'kecamatan'    => 'nullable|string|max:255',
            'kabupaten'    => 'nullable|string|max:255',
            'provinsi'     => 'nullable|string|max:255',
            'logo'         => 'nullable|image|mimes:jpeg,png,jpg|max:10240', // 10 MB
            'foto'         => 'nullable|image|mimes:jpeg,png,jpg|max:10240', // 10 MB
            'kepala_desa'  => 'nullable|string|max:255',
            'latitude'     => 'nullable|numeric|between:-90,90',
            'longitude'    => 'nullable|numeric|between:-180,180',
        ]);
        if ($request->hasFile('logo')) {
            if ($desa->logo && Storage::disk('public')->exists($desa->logo)) {
                Storage::disk('public')->delete($desa->logo);
            }
            $validated['logo'] = $request->file('logo')->store('logos', 'public');
        }

        if ($request->hasFile('foto')) {
            if ($desa->foto && Storage::disk('public')->exists($desa->foto)) {
                Storage::disk('public')->delete($desa->foto);
            }
            $validated['foto'] = $request->file('foto')->store('fotos', 'public');
        }

        $desa->update($validated);

        return redirect()->route('admin.desa.index')->with('success', 'Data desa berhasil diperbarui.');
    }

    public function destroy(Desa $desa)
    {
        if ($desa->logo && Storage::disk('public')->exists($desa->logo)) {
            Storage::disk('public')->delete($desa->logo);
        }
        if ($desa->foto && Storage::disk('public')->exists($desa->foto)) {
            Storage::disk('public')->delete($desa->foto);
        }

        $desa->delete();

        return redirect()->route('admin.desa.index')->with('success', 'Data desa berhasil dihapus.');
    }
}
