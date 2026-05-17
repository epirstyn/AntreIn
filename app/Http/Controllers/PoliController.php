<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    public function index()
    {
        $polis = Poli::latest()->get();

        return view('admin.poli.index', compact('polis'));
    }

    public function create()
    {
        return view('admin.poli.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_poli' => 'required',
        ]);

        Poli::create([
            'nama_poli' => $request->nama_poli,
            'deskripsi' => $request->deskripsi,
            'jam_buka' => $request->jam_buka,
            'jam_tutup' => $request->jam_tutup,
        ]);

        return redirect('/poli')
            ->with('success', 'Data poli berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $poli = Poli::findOrFail($id);

        return view('admin.poli.show', compact('poli'));
    }

    public function edit(string $id)
    {
        $poli = Poli::findOrFail($id);

        return view('admin.poli.edit', compact('poli'));
    }

    public function update(Request $request, string $id)
    {
        $poli = Poli::findOrFail($id);

        $request->validate([
            'nama_poli' => 'required',
        ]);

        $poli->update([
            'nama_poli' => $request->nama_poli,
            'deskripsi' => $request->deskripsi,
            'jam_buka' => $request->jam_buka,
            'jam_tutup' => $request->jam_tutup,
        ]);

        return redirect('/poli')
            ->with('success', 'Data poli berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $poli = Poli::findOrFail($id);

        $poli->delete();

        return redirect('/poli')
            ->with('success', 'Data poli berhasil dihapus');
    }
}