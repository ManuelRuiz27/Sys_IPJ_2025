<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use Illuminate\Http\Request;
use App\Http\Requests\BeneficiarioRequest;

class BeneficiarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $curp = $request->query('curp');
        $folio = $request->query('folio');

        $beneficiarios = Beneficiario::query()
            ->when($curp, fn($q) => $q->where('curp', 'like', "%{$curp}%"))
            ->when($folio, fn($q) => $q->where('folio_tarjeta', 'like', "%{$folio}%"))
            ->paginate(10)
            ->appends($request->only('curp', 'folio'));

        return view('beneficiarios.index', [
            'beneficiarios' => $beneficiarios,
            'curp' => $curp,
            'folio' => $folio,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('beneficiarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BeneficiarioRequest $request)
    {
        $beneficiario = Beneficiario::create($request->validated());

        return redirect()
            ->route('beneficiarios.show', $beneficiario)
            ->with('status', 'Beneficiario creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Beneficiario $beneficiario)
    {
        $beneficiario->load('domicilio', 'programas');

        return view('beneficiarios.show', compact('beneficiario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Beneficiario $beneficiario)
    {
        return view('beneficiarios.edit', compact('beneficiario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BeneficiarioRequest $request, Beneficiario $beneficiario)
    {
        $beneficiario->update($request->validated());

        return redirect()
            ->route('beneficiarios.show', $beneficiario)
            ->with('status', 'Beneficiario actualizado');
    }
}
