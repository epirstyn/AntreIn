<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dokter extends Model
{
    use HasFactory;

    protected $fillable = [
        'poli_id',
        'nama_dokter',
        'spesialis',
        'jadwal_praktek',
        'foto',
    ];

    public function poli()
    {
        return $this->belongsTo(Poli::class);
    }

    public function antreans()
    {
        return $this->hasMany(Antrean::class);
    }
}