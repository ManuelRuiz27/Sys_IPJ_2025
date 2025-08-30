<?php

namespace App\Http\Controllers;

use App\Models\Beca;
use App\Models\Beneficiario;
use App\Models\ConferenciaNomada;
use App\Models\ConsultaPsicologica;
use App\Models\GrupoManejo;
use App\Models\PeriodoManejo;
use App\Models\Programa;
use App\Models\TemaNomada;
use Illuminate\Http\JsonResponse;

class ReportController extends Controller
{
    public function basic(): JsonResponse
    {
        return response()->json([
            'beneficiarios' => Beneficiario::count(),
            'programas' => Programa::count(),
            'periodos' => PeriodoManejo::count(),
            'grupos' => GrupoManejo::count(),
            'consultas_psicologicas' => ConsultaPsicologica::count(),
            'becas' => Beca::count(),
            'temas_nomada' => TemaNomada::count(),
            'conferencias_nomada' => ConferenciaNomada::count(),
        ]);
    }
}

