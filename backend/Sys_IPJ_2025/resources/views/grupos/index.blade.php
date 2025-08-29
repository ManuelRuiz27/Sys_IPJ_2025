<x-layout title="Grupos">
    <div class="d-flex justify-content-between mb-3">
        <form method="GET" class="row row-cols-lg-auto g-2 align-items-center">
            <div class="col">
                <select name="periodo_id" class="form-select">
                    <option value="">Periodo</option>
                    @foreach ($periodos as $periodo)
                        <option value="{{ $periodo->id }}" @selected($periodo_id == $periodo->id)>
                            {{ $periodo->mes }}/{{ $periodo->anio }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <input type="text" name="horario" class="form-control" placeholder="Horario" value="{{ $horario }}">
            </div>
            <div class="col">
                <button type="submit" class="btn btn-secondary">Filtrar</button>
            </div>
        </form>
        <a href="{{ route('grupos.create') }}" class="btn btn-primary">Nuevo</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Periodo</th>
                <th>Horario</th>
                <th>Cupo utilizado</th>
                <th class="text-end">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($grupos as $grupo)
                <tr>
                    <td>{{ $grupo->periodo->mes }}/{{ $grupo->periodo->anio }}</td>
                    <td>{{ $grupo->horario }}</td>
                    <td>{{ $grupo->total_hombres + $grupo->total_mujeres }} / {{ $grupo->cupo_total }}</td>
                    <td class="text-end">
                        <a href="{{ route('grupos.show', $grupo) }}" class="btn btn-sm btn-info">Ver</a>
                        <a href="{{ route('grupos.edit', $grupo) }}" class="btn btn-sm btn-warning">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $grupos->links() }}
</x-layout>

