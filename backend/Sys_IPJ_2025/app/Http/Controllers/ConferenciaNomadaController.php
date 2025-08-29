<?php

namespace App\Http\Controllers;

use App\Models\ConferenciaNomada;
use App\Http\Requests\ConferenciaNomadaRequest;
use Illuminate\Http\Request;

class ConferenciaNomadaController extends Controller
{
    public function index(Request $request)
    {
        $mes = $request->query('mes');
        $municipio = $request->query('municipio');

        $conferencias = ConferenciaNomada::query()
            ->when($mes, fn($q) => $q->whereMonth('fecha', $mes))
            ->when($municipio, fn($q) => $q->where('municipio', $municipio))
            ->with('tema')
            ->get();

        return response()->json($conferencias);
    }

    public function store(ConferenciaNomadaRequest $request)
    {
        $conferencia = ConferenciaNomada::create($request->validated());

        return response()->json($conferencia, 201);
    }

    public function show(ConferenciaNomada $conferencia_nomada)
    {
        return response()->json($conferencia_nomada->load('tema'));
    }

    public function update(ConferenciaNomadaRequest $request, ConferenciaNomada $conferencia_nomada)
    {
        $conferencia_nomada->update($request->validated());

        return response()->json($conferencia_nomada);
    }

    public function destroy(ConferenciaNomada $conferencia_nomada)
    {
        $conferencia_nomada->delete();

        return response()->noContent();
    }
}
