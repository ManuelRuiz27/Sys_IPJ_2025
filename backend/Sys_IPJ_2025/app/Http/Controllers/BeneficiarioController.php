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
        $search = $request->query('search');

        $beneficiarios = Beneficiario::query()
            ->when($search, function ($query, $search) {
                $query->where('curp', 'like', "%{$search}%")
                      ->orWhere('folio_tarjeta', 'like', "%{$search}%");
            })
            ->get();

        return response()->json($beneficiarios);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BeneficiarioRequest $request)
    {
        $beneficiario = Beneficiario::create($request->validated());

        return response()->json($beneficiario, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Beneficiario $beneficiario)
    {
        return response()->json($beneficiario);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Beneficiario $beneficiario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BeneficiarioRequest $request, Beneficiario $beneficiario)
    {
        $beneficiario->update($request->validated());

        return response()->json($beneficiario);
    }
}
