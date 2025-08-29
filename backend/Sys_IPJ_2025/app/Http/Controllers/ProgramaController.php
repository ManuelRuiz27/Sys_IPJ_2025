<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use App\Models\Beneficiario;
use App\Http\Requests\ProgramaRequest;
use Illuminate\Http\Request;

class ProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return response()->json(Programa::all());
        }

        $programas = Programa::paginate(10);

        return view('programas.index', compact('programas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProgramaRequest $request)
    {
        $programa = Programa::create($request->validated());

        return response()->json($programa, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Programa $programa)
    {
        $programa->load('beneficiarios');

        return response()->json($programa);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProgramaRequest $request, Programa $programa)
    {
        $programa->update($request->validated());

        return response()->json($programa);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Programa $programa)
    {
        $programa->delete();

        return response()->noContent();
    }

    /**
     * Attach or detach a beneficiario to the programa.
     */
    public function toggleBeneficiario(Programa $programa, Beneficiario $beneficiario)
    {
        $programa->beneficiarios()->toggle($beneficiario->id);

        return response()->json($programa->load('beneficiarios'));
    }
}
