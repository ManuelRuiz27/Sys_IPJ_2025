<?php

namespace App\Http\Controllers;

use App\Models\PeriodoManejo;
use App\Http\Requests\PeriodoManejoRequest;
use Illuminate\Http\Request;

class PeriodoManejoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $anio = $request->input('anio');
        $mes = $request->input('mes');

        $query = PeriodoManejo::query();

        if ($anio) {
            $query->where('anio', $anio);
        }

        if ($mes) {
            $query->where('mes', $mes);
        }

        $periodos = $query
            ->orderByDesc('anio')
            ->orderByDesc('mes')
            ->paginate(10)
            ->withQueryString();

        return view('periodos.index', [
            'periodos' => $periodos,
            'anio' => $anio,
            'mes' => $mes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('periodos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PeriodoManejoRequest $request)
    {
        $periodo = PeriodoManejo::create($request->validated());

        return redirect()
            ->route('periodos.show', $periodo)
            ->with('status', 'Periodo creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(PeriodoManejo $periodo, Request $request)
    {
        $horario = $request->input('horario');

        $periodo->load(['grupos' => function ($query) use ($horario) {
            if ($horario) {
                $query->where('horario', 'like', "%$horario%");
            }
        }]);

        return view('periodos.show', [
            'periodo' => $periodo,
            'horario' => $horario,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PeriodoManejo $periodo)
    {
        return view('periodos.edit', compact('periodo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PeriodoManejoRequest $request, PeriodoManejo $periodo)
    {
        $periodo->update($request->validated());

        return redirect()
            ->route('periodos.show', $periodo)
            ->with('status', 'Periodo actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PeriodoManejo $periodo)
    {
        $periodo->delete();
        return redirect()->route('periodos.index')->with('status', 'Periodo eliminado');
    }

    /**
     * Report of inscriptions by sex for the periodo.
     */
    public function reporteSexo(PeriodoManejo $periodo)
    {
        $hombres = $periodo->grupos()->sum('total_hombres');
        $mujeres = $periodo->grupos()->sum('total_mujeres');

        return response()->json([
            'hombres' => $hombres,
            'mujeres' => $mujeres,
        ]);
    }
}
