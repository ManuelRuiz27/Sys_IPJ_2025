<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConferenciaNomada extends Model
{
    use HasFactory;

    protected $fillable = [
        'tema_nomada_id',
        'titulo',
        'fecha',
        'municipio',
        'descripcion',
    ];

    protected $casts = [
        'fecha' => 'date',
    ];

    public function tema()
    {
        return $this->belongsTo(TemaNomada::class, 'tema_nomada_id');
    }
}
