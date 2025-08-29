<x-layout title="Periodos">
    <div class="d-flex justify-content-between mb-3">
        <form method="GET" class="row row-cols-lg-auto g-2 align-items-center">
            <div class="col">
                <input type="number" name="anio" class="form-control" placeholder="Año" value="{{ $anio }}">
            </div>
            <div class="col">
                <input type="number" name="mes" class="form-control" placeholder="Mes" value="{{ $mes }}">
            </div>
            <div class="col">
                <button type="submit" class="btn btn-secondary">Filtrar</button>
            </div>
        </form>
        <a href="{{ route('periodos.create') }}" class="btn btn-primary">Nuevo</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Año</th>
                <th>Mes</th>
                <th class="text-end">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($periodos as $periodo)
                <tr>
                    <td>{{ $periodo->anio }}</td>
                    <td>{{ $periodo->mes }}</td>
                    <td class="text-end">
                        <a href="{{ route('periodos.show', $periodo) }}" class="btn btn-sm btn-info">Ver</a>
                        <a href="{{ route('periodos.edit', $periodo) }}" class="btn btn-sm btn-warning">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $periodos->links() }}
</x-layout>

