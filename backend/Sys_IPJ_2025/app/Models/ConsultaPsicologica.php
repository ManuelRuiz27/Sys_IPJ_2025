<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultaPsicologica extends Model
{
    use HasFactory;

    protected $table = 'consultas_psicologicas';

    protected $fillable = [
        'beneficiario_id',
        'fecha',
        'hora',
    ];

    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class);
    }
}
