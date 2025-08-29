<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoManejo extends Model
{
    use HasFactory;

    protected $table = 'grupos_manejo';

    protected $fillable = [
        'periodo_id',
        'horario',
        'cupo_total',
        'total_hombres',
        'total_mujeres',
    ];

    /**
     * Get the periodo that owns the grupo.
     */
    public function periodo()
    {
        return $this->belongsTo(PeriodoManejo::class, 'periodo_id');
    }

    /**
     * Get the inscripciones for the grupo.
     */
    public function inscripciones()
    {
        return $this->hasMany(InscripcionManejo::class, 'grupo_id');
    }
}
