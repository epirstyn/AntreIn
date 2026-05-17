<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Poli extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_poli',
        'deskripsi',
        'jam_buka',
        'jam_tutup',
    ];

    public function dokters()
    {
        return $this->hasMany(Dokter::class);
    }

    public function antreans()
    {
        return $this->hasMany(Antrean::class);
    }
}