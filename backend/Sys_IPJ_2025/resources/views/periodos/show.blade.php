<x-layout :title="'Periodo ' . $periodo->mes . '/' . $periodo->anio">
    <h1 class="h3 mb-3">Periodo {{ $periodo->mes }}/{{ $periodo->anio }}</h1>
    <form method="GET" class="row row-cols-lg-auto g-2 align-items-center mb-3">
        <div class="col">
            <input type="text" name="horario" class="form-control" placeholder="Horario" value="{{ $horario }}">
        </div>
        <div class="col">
            <button type="submit" class="btn btn-secondary">Filtrar</button>
        </div>
    </form>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Horario</th>
                <th>Cupo utilizado</th>
                <th class="text-end">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($periodo->grupos as $grupo)
                <tr>
                    <td>{{ $grupo->horario }}</td>
                    <td>{{ $grupo->total_hombres + $grupo->total_mujeres }} / {{ $grupo->cupo_total }}</td>
                    <td class="text-end">
                        <a href="{{ route('grupos.show', $grupo) }}" class="btn btn-sm btn-info">Ver</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>

