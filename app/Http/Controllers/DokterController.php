<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Poli;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        $dokters = Dokter::with('poli')->latest()->get();

        return view('admin.dokter.index', compact('dokters'));
    }

    public function create()
    {
        $polis = Poli::all();

        return view('admin.dokter.create', compact('polis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'poli_id' => 'required',
            'nama_dokter' => 'required',
        ]);

        Dokter::create([
            'poli_id' => $request->poli_id,
            'nama_dokter' => $request->nama_dokter,
            'spesialis' => $request->spesialis,
            'jadwal_praktek' => $request->jadwal_praktek,
        ]);

        return redirect('/dokter')
            ->with('success', 'Dokter berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $dokter = Dokter::with('poli')->findOrFail($id);

        return view('admin.dokter.show', compact('dokter'));
    }

    public function edit(string $id)
    {
        $dokter = Dokter::findOrFail($id);

        $polis = Poli::all();

        return view('admin.dokter.edit', compact('dokter', 'polis'));
    }

    public function update(Request $request, string $id)
    {
        $dokter = Dokter::findOrFail($id);

        $dokter->update([
            'poli_id' => $request->poli_id,
            'nama_dokter' => $request->nama_dokter,
            'spesialis' => $request->spesialis,
            'jadwal_praktek' => $request->jadwal_praktek,
        ]);

        return redirect('/dokter')
            ->with('success', 'Dokter berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $dokter = Dokter::findOrFail($id);

        $dokter->delete();

        return redirect('/dokter')
            ->with('success', 'Dokter berhasil dihapus');
    }
}