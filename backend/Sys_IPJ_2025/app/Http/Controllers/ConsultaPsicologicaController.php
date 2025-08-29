<?php

namespace App\Http\Controllers;

use App\Models\ConsultaPsicologica;
use App\Models\Beneficiario;
use App\Http\Requests\ConsultaPsicologicaRequest;
use Illuminate\Http\Request;

class ConsultaPsicologicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $beneficiarioId = $request->query('beneficiario_id');
        $fecha = $request->query('fecha');

        $consultas = ConsultaPsicologica::query()
            ->when($beneficiarioId, fn($q) => $q->where('beneficiario_id', $beneficiarioId))
            ->when($fecha, fn($q) => $q->where('fecha', $fecha))
            ->orderByDesc('fecha')
            ->paginate(10)
            ->appends($request->only('beneficiario_id', 'fecha'));

        $beneficiarios = Beneficiario::orderBy('nombre')->get();

        return view('consultas-psicologicas.index', [
            'consultas' => $consultas,
            'beneficiarios' => $beneficiarios,
            'beneficiario_id' => $beneficiarioId,
            'fecha' => $fecha,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $beneficiarios = Beneficiario::orderBy('nombre')->get();

        return view('consultas-psicologicas.create', compact('beneficiarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ConsultaPsicologicaRequest $request)
    {
        ConsultaPsicologica::create($request->validated());

        return redirect()
            ->route('consultas-psicologicas.index')
            ->with('status', 'Consulta registrada');
    }
}
