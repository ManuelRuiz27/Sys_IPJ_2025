<?php

namespace App\Http\Controllers;

use App\Models\TemaNomada;
use App\Http\Requests\TemaNomadaRequest;
use Illuminate\Http\Request;

class TemaNomadaController extends Controller
{
    public function index()
    {
        return response()->json(TemaNomada::all());
    }

    public function store(TemaNomadaRequest $request)
    {
        $tema = TemaNomada::create($request->validated());

        return response()->json($tema, 201);
    }

    public function show(TemaNomada $tema_nomada)
    {
        return response()->json($tema_nomada->load('conferencias'));
    }

    public function update(TemaNomadaRequest $request, TemaNomada $tema_nomada)
    {
        $tema_nomada->update($request->validated());

        return response()->json($tema_nomada);
    }

    public function destroy(TemaNomada $tema_nomada)
    {
        $tema_nomada->delete();

        return response()->noContent();
    }
}
