<x-layout :title="'Grupo ' . $grupo->id">
    <h1 class="h3 mb-3">Grupo {{ $grupo->horario }} - {{ $grupo->periodo->mes }}/{{ $grupo->periodo->anio }}</h1>
    <p>Cupo utilizado: {{ $grupo->total_hombres + $grupo->total_mujeres }} / {{ $grupo->cupo_total }}</p>

    @if ($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <h2 class="h4 mt-4">Inscripciones</h2>
    <form method="POST" action="{{ route('inscripciones.store') }}" class="row row-cols-lg-auto g-2 align-items-center mb-3">
        @csrf
        <input type="hidden" name="grupo_id" value="{{ $grupo->id }}">
        <div class="col">
            <select name="beneficiario_id" class="form-select">
                @foreach ($beneficiarios as $beneficiario)
                    <option value="{{ $beneficiario->id }}">{{ $beneficiario->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <button type="submit" class="btn btn-primary">Inscribir</button>
        </div>
    </form>
    @error('beneficiario_id')
        <div class="text-danger small mb-3">{{ $message }}</div>
    @enderror

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Beneficiario</th>
                <th>CURP</th>
                <th class="text-end">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($grupo->inscripciones as $inscripcion)
                <tr>
                    <td>{{ $inscripcion->beneficiario->nombre }}</td>
                    <td>{{ $inscripcion->beneficiario->curp }}</td>
                    <td class="text-end">
                        <form method="POST" action="{{ route('inscripciones.destroy', $inscripcion) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Baja</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>

