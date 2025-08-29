<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domicilio extends Model
{
    use HasFactory;

    /**
     * Get the beneficiario that owns the domicilio.
     */
    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class);
    }
}
