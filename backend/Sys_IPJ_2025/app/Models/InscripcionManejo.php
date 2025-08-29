<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InscripcionManejo extends Model
{
    use HasFactory;

    protected $table = 'inscripciones_manejo';

    protected $fillable = [
        'beneficiario_id',
        'grupo_id',
    ];

    /**
     * Get the beneficiario for the inscripcion.
     */
    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class, 'beneficiario_id');
    }

    /**
     * Get the grupo of the inscripcion.
     */
    public function grupo()
    {
        return $this->belongsTo(GrupoManejo::class, 'grupo_id');
    }
}
