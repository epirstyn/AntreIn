<?php

namespace App\Http\Controllers;

use App\Models\Antrean;
use App\Models\Dokter;
use App\Models\Poli;
use Illuminate\Http\Request;

class AntreanController extends Controller
{
    public function index()
    {
        $antreans = Antrean::with([
            'user',
            'poli',
            'dokter'
        ])->latest()->get();

        return view('pasien.antrean.index', compact('antreans'));
    }

    public function create()
    {
        $polis = Poli::all();

        $dokters = Dokter::all();

        return view('pasien.antrean.create', compact(
            'polis',
            'dokters'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'poli_id' => 'required',
            'dokter_id' => 'required',
            'tanggal' => 'required',
        ]);

        $jumlah = Antrean::count() + 1;

        $kode = 'A-' . str_pad($jumlah, 3, '0', STR_PAD_LEFT);

        Antrean::create([
            'kode_antrean' => $kode,
            'user_id' => auth()->id(),
            'poli_id' => $request->poli_id,
            'dokter_id' => $request->dokter_id,
            'tanggal' => $request->tanggal,
            'status' => 'menunggu',
        ]);

        return redirect('/antrean')
            ->with('success', 'Antrean berhasil diambil');
    }

    public function show(string $id)
    {
        $antrean = Antrean::with([
            'user',
            'poli',
            'dokter'
        ])->findOrFail($id);

        return view('pasien.antrean.show', compact('antrean'));
    }

    public function destroy(string $id)
    {
        $antrean = Antrean::findOrFail($id);

        $antrean->delete();

        return redirect('/antrean')
            ->with('success', 'Antrean berhasil dibatalkan');
    }
}