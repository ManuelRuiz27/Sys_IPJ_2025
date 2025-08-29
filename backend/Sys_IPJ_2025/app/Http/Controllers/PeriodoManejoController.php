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
    public function index()
    {
        $periodos = PeriodoManejo::orderByDesc('anio')->orderByDesc('mes')->paginate(10);
        return view('periodos.index', compact('periodos'));
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
    public function show(PeriodoManejo $periodo)
    {
        $periodo->load('grupos');
        return view('periodos.show', compact('periodo'));
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
