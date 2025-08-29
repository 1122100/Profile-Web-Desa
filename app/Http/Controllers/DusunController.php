<?php

namespace App\Http\Controllers;

use App\Models\Dusun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DusunController extends Controller
{
    /**
     * Display a listing of the dusun.
     */
    public function index()
    {
        $dusuns = Dusun::all();
        return view('admin.dusun.index', compact('dusuns'));
    }

    /**
     * Show the form for creating a new dusun.
     */
    public function create()
    {
        return view('admin.dusun.create');
    }

    /**
     * Store a newly created dusun in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kepala_dusun' => 'required|string|max:255',
            'jumlah_penduduk' => 'required|integer',
            'luas_wilayah' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $dusun = Dusun::create($request->all());

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('dusuns', 'public');
            $dusun->update(['foto' => $path]);
        }

        return redirect()->route('admin.dusun.index')
            ->with('success', 'Dusun berhasil ditambahkan.');
    }

    /**
     * Display the specified dusun.
     */
    public function show(Dusun $dusun)
    {
        return view('admin.dusun.show', compact('dusun'));
    }

    /**
     * Show the form for editing the specified dusun.
     */
    public function edit(Dusun $dusun)
    {
        return view('admin.dusun.edit', compact('dusun'));
    }

    /**
     * Update the specified dusun in storage.
     */
    public function update(Request $request, Dusun $dusun)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kepala_dusun' => 'required|string|max:255',
            'jumlah_penduduk' => 'required|integer',
            'luas_wilayah' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $dusun->update($request->all());

        if ($request->hasFile('foto')) {
            if ($dusun->foto && Storage::disk('public')->exists($dusun->foto)) {
                Storage::disk('public')->delete($dusun->foto);
            }
            $path = $request->file('foto')->store('dusuns', 'public');
            $dusun->update(['foto' => $path]);
        }
        return redirect()->route('admin.dusun.index')
            ->with('success', 'Dusun berhasil diperbarui.');
    }

    /**
     * Remove the specified dusun from storage.
     */
    public function destroy(Dusun $dusun)
    {
        if ($dusun->foto && Storage::disk('public')->exists($dusun->foto)) {
            Storage::disk('public')->delete($dusun->foto);
        }
        $dusun->delete();

        return redirect()->route('admin.dusun.index')
            ->with('success', 'Dusun berhasil dihapus.');
    }
}
