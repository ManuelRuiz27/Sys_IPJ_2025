<?php

namespace App\Http\Controllers;

use App\Models\GrupoManejo;
use App\Models\PeriodoManejo;
use App\Http\Requests\GrupoManejoRequest;
use Illuminate\Http\Request;

class GrupoManejoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grupos = GrupoManejo::with('periodo')->paginate(10);
        return view('grupos.index', compact('grupos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $periodos = PeriodoManejo::orderByDesc('anio')->orderByDesc('mes')->get();
        return view('grupos.create', compact('periodos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GrupoManejoRequest $request)
    {
        $data = $request->validated();
        $data['total_hombres'] = 0;
        $data['total_mujeres'] = 0;
        $grupo = GrupoManejo::create($data);

        return redirect()->route('grupos.show', $grupo)->with('status', 'Grupo creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(GrupoManejo $grupo)
    {
        $grupo->load('periodo', 'inscripciones.beneficiario');
        return view('grupos.show', compact('grupo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GrupoManejo $grupo)
    {
        $periodos = PeriodoManejo::orderByDesc('anio')->orderByDesc('mes')->get();
        return view('grupos.edit', compact('grupo', 'periodos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GrupoManejoRequest $request, GrupoManejo $grupo)
    {
        $grupo->update($request->validated());

        return redirect()->route('grupos.show', $grupo)->with('status', 'Grupo actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GrupoManejo $grupo)
    {
        $grupo->delete();
        return redirect()->route('grupos.index')->with('status', 'Grupo eliminado');
    }

    /**
     * Report of inscriptions by sex for the grupo.
     */
    public function reporteSexo(GrupoManejo $grupo)
    {
        return response()->json([
            'hombres' => $grupo->total_hombres,
            'mujeres' => $grupo->total_mujeres,
        ]);
    }
}
