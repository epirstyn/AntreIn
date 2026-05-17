<?php

namespace App\Http\Controllers;

use App\Models\Poli;

class LandingController extends Controller
{
    public function index()
    {
        $polis = Poli::latest()->get();

        return view('landingpage', compact('polis'));
    }
}