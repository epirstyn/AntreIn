<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemanggilan extends Model
{
    use HasFactory;

    protected $fillable = [
        'antrean_id',
        'dipanggil_pada',
    ];

    protected $casts = [
        'dipanggil_pada' => 'datetime',
    ];

    public function antrean()
    {
        return $this->belongsTo(Antrean::class);
    }
}