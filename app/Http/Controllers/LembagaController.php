<?php

namespace App\Http\Controllers;

use App\Models\Dusun;
use App\Models\Lembaga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LembagaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lembagas = Lembaga::with('dusun')->latest()->get();
        return view('admin.lembaga.index', compact('lembagas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dusuns = Dusun::all();
        return view('admin.lembaga.create', compact('dusuns'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lembaga' => 'required|string|max:255',
            'jenis_lembaga' => 'required|string|max:255',
            'tahun_berdiri' => 'nullable|numeric|min:1900|max:' . date('Y'),
            'dusun_id' => 'required|exists:dusuns,id',
            'alamat_detail' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('lembaga', 'public');
        }

        Lembaga::create($data);

        return redirect()->route('admin.lembaga.index')
            ->with('success', 'Data lembaga berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lembaga $lembaga)
    {
        return view('admin.lembaga.show', compact('lembaga'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lembaga $lembaga)
    {
        $dusuns = Dusun::all();
        return view('admin.lembaga.edit', compact('lembaga', 'dusuns'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lembaga $lembaga)
    {
        $request->validate([
            'nama_lembaga' => 'required|string|max:255',
            'jenis_lembaga' => 'required|string|max:255',
            'tahun_berdiri' => 'nullable|numeric|min:1900|max:' . date('Y'),
            'dusun_id' => 'required|exists:dusuns,id',
            'alamat_detail' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            // Delete old image if exists
            if ($lembaga->foto && Storage::disk('public')->exists($lembaga->foto)) {
                Storage::disk('public')->delete($lembaga->foto);
            }

            $data['foto'] = $request->file('foto')->store('lembaga', 'public');
        }

        $lembaga->update($data);

        return redirect()->route('admin.lembaga.index')
            ->with('success', 'Data lembaga berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lembaga $lembaga)
    {
        $lembaga->delete();

        return redirect()->route('admin.lembaga.index')
            ->with('success', 'Data lembaga berhasil dihapus.');
    }
}
