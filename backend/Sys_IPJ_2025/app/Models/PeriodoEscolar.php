<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodoEscolar extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'nombre',
        'fecha_inicio',
        'fecha_fin',
    ];

    /**
     * Get the becas for the periodo escolar.
     */
    public function becas()
    {
        return $this->hasMany(Beca::class);
    }
}
