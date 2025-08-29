<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class BeneficiarioPrograma extends Pivot
{
    protected $table = 'beneficiario_programa';

    protected $fillable = [
        'beneficiario_id',
        'programa_id',
    ];

    /**
     * Get the beneficiario for this pivot.
     */
    public function beneficiario()
    {
        return $this->belongsTo(Beneficiario::class);
    }

    /**
     * Get the programa for this pivot.
     */
    public function programa()
    {
        return $this->belongsTo(Programa::class);
    }
}
