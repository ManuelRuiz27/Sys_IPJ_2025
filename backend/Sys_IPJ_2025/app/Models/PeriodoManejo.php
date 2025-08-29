<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodoManejo extends Model
{
    use HasFactory;

    protected $table = 'periodos_manejo';

    protected $fillable = [
        'anio',
        'mes',
    ];

    /**
     * Get the grupos de manejo for the periodo.
     */
    public function grupos()
    {
        return $this->hasMany(GrupoManejo::class, 'periodo_id');
    }
}
