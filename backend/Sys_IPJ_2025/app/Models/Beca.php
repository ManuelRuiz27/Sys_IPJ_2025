<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beca extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'periodo_escolar_id',
        'beneficiario_id',
        'porcentaje',
    ];

    /**
     * Get the periodo escolar associated with the beca.
     */
    public function periodoEscolar()
    {
        return $this->belongsTo(PeriodoEscolar::class);
    }

    /**
     * Get the beneficiario associated with the beca.
     */
    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class);
    }
}
