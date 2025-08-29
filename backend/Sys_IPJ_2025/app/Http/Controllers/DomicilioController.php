<?php

namespace App\Http\Controllers;

use App\Http\Requests\DomicilioRequest;
use App\Models\Beneficiario;
use App\Models\Domicilio;

class DomicilioController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Beneficiario $beneficiario)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DomicilioRequest $request, Beneficiario $beneficiario)
    {
        $domicilio = $beneficiario->domicilio()->create($request->validated());

        return response()->json($domicilio, 201);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Domicilio $domicilio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DomicilioRequest $request, Domicilio $domicilio)
    {
        $domicilio->update($request->validated());

        return response()->json($domicilio);
    }
}
