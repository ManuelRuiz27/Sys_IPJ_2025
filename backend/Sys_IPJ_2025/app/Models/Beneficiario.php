<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{
    use HasFactory;

    /**
     * Get the domicilio associated with the beneficiario.
     */
    public function domicilio()
    {
        return $this->hasOne(Domicilio::class);
    }

    /**
     * The programas that belong to the beneficiario.
     */
    public function programas()
    {
        return $this->belongsToMany(Programa::class, 'beneficiario_programa')
                    ->using(BeneficiarioPrograma::class);
    }
}
