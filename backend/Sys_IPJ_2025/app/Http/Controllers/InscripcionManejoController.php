<?php

namespace App\Http\Controllers;

use App\Models\InscripcionManejo;
use App\Models\GrupoManejo;
use App\Models\Beneficiario;
use App\Http\Requests\InscripcionManejoRequest;
use Illuminate\Http\Request;

class InscripcionManejoController extends Controller
{
    /**
     * Store a newly created inscripcion.
     */
    public function store(InscripcionManejoRequest $request)
    {
        $grupo = GrupoManejo::findOrFail($request->grupo_id);
        $beneficiario = Beneficiario::findOrFail($request->beneficiario_id);

        if (($grupo->total_hombres + $grupo->total_mujeres) >= $grupo->cupo_total) {
            return back()->withErrors('El grupo ha alcanzado el cupo disponible');
        }

        if ($grupo->inscripciones()->where('beneficiario_id', $beneficiario->id)->exists()) {
            return back()->withErrors('Beneficiario ya inscrito en este grupo');
        }

        InscripcionManejo::create([
            'beneficiario_id' => $beneficiario->id,
            'grupo_id' => $grupo->id,
        ]);

        $sexo = strtoupper(substr($beneficiario->curp, 10, 1));
        if ($sexo === 'H') {
            $grupo->increment('total_hombres');
        } else {
            $grupo->increment('total_mujeres');
        }

        return redirect()->route('grupos.show', $grupo)->with('status', 'Beneficiario inscrito');
    }

    /**
     * Remove the specified inscripcion.
     */
    public function destroy(InscripcionManejo $inscripcion)
    {
        $grupo = $inscripcion->grupo;
        $beneficiario = $inscripcion->beneficiario;
        $sexo = strtoupper(substr($beneficiario->curp, 10, 1));

        $inscripcion->delete();

        if ($sexo === 'H') {
            $grupo->decrement('total_hombres');
        } else {
            $grupo->decrement('total_mujeres');
        }

        return redirect()->route('grupos.show', $grupo)->with('status', 'Inscripción eliminada');
    }
}
