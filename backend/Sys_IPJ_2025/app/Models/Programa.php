<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    /**
     * The beneficiarios that belong to the programa.
     */
    public function beneficiarios()
    {
        return $this->belongsToMany(Beneficiario::class, 'beneficiario_programa')
                    ->using(BeneficiarioPrograma::class);
    }
}
