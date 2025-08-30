<?php

namespace App\Http\Controllers;

use App\Models\Beca;
use App\Models\PeriodoEscolar;
use App\Models\Beneficiario;
use App\Http\Requests\BecaRequest;

class BecaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $becas = Beca::with(['periodoEscolar', 'beneficiario'])->paginate(10);

        return view('becas.index', compact('becas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $periodos = PeriodoEscolar::orderByDesc('fecha_inicio')->get();
        $beneficiarios = Beneficiario::orderBy('nombre')->get();

        return view('becas.create', compact('periodos', 'beneficiarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BecaRequest $request)
    {
        Beca::create($request->validated());

        return redirect()
            ->route('becas.index')
            ->with('status', 'Beca asignada');
    }

    /**
     * Display the specified resource.
     */
    public function show(Beca $beca)
    {
        $beca->load(['periodoEscolar', 'beneficiario']);

        return view('becas.show', compact('beca'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Beca $beca)
    {
        $periodos = PeriodoEscolar::orderByDesc('fecha_inicio')->get();
        $beneficiarios = Beneficiario::orderBy('nombre')->get();

        return view('becas.edit', compact('beca', 'periodos', 'beneficiarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BecaRequest $request, Beca $beca)
    {
        $beca->update($request->validated());

        return redirect()
            ->route('becas.show', $beca)
            ->with('status', 'Beca actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Beca $beca)
    {
        $beca->delete();

        return redirect()
            ->route('becas.index')
            ->with('status', 'Beca eliminada');
    }
}
