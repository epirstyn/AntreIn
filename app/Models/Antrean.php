<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Antrean extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_antrean',
        'user_id',
        'poli_id',
        'dokter_id',
        'tanggal',
        'status',
        'estimasi_waktu',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function poli()
    {
        return $this->belongsTo(Poli::class);
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }
    public function pemanggilan()
{
    return $this->hasOne(Pemanggilan::class);
}
}