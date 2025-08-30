<?php

namespace App\Http\Controllers;

use App\Models\PeriodoEscolar;
use App\Http\Requests\PeriodoEscolarRequest;
use Illuminate\Http\Request;

class PeriodoEscolarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $periodos = PeriodoEscolar::orderByDesc('fecha_inicio')->paginate(10);

        return view('periodos-escolares.index', compact('periodos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('periodos-escolares.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PeriodoEscolarRequest $request)
    {
        $periodo = PeriodoEscolar::create($request->validated());

        return redirect()
            ->route('periodos-escolares.show', $periodo)
            ->with('status', 'Periodo escolar creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(PeriodoEscolar $periodo)
    {
        $periodo->load('becas.beneficiario');

        return view('periodos-escolares.show', compact('periodo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PeriodoEscolar $periodo)
    {
        return view('periodos-escolares.edit', compact('periodo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PeriodoEscolarRequest $request, PeriodoEscolar $periodo)
    {
        $periodo->update($request->validated());

        return redirect()
            ->route('periodos-escolares.show', $periodo)
            ->with('status', 'Periodo escolar actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PeriodoEscolar $periodo)
    {
        $periodo->delete();

        return redirect()
            ->route('periodos-escolares.index')
            ->with('status', 'Periodo escolar eliminado');
    }
}
