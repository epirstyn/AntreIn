<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\AntreanController;
use App\Http\Controllers\LandingController;


Route::get('/', [LandingController::class, 'index'])
    ->name('landingpage');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {

        if (auth()->user()->role == 'admin') {
            return redirect('/admin');
        }

        if (auth()->user()->role == 'petugas') {
            return redirect('/petugas');
        }

        return redirect('/pasien');

    })->name('dashboard');

});

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin', function () {
        return view('admin.dashboard');
    });

    Route::resource('poli', PoliController::class);

    Route::resource('dokter', DokterController::class);
});

Route::middleware(['auth', 'role:petugas'])->group(function () {

    Route::get('/petugas', function () {
        return view('petugas.dashboard');
    });

});

Route::middleware(['auth', 'role:pasien'])->group(function () {

    Route::get('/pasien', function () {
        return view('pasien.dashboard');
    });

    Route::resource('antrean', AntreanController::class);
});

require __DIR__.'/auth.php';