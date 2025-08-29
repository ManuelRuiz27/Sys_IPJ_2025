<x-layout title="Consultas psicológicas">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Consultas psicológicas</h1>
        <a href="{{ route('consultas-psicologicas.create') }}" class="btn btn-primary">Nueva</a>
    </div>
    <form class="row g-2 mb-4" method="GET" action="{{ route('consultas-psicologicas.index') }}">
        <div class="col-auto">
            <select name="beneficiario_id" class="form-select">
                <option value="">Todos los beneficiarios</option>
                @foreach ($beneficiarios as $b)
                    <option value="{{ $b->id }}" @selected($beneficiario_id == $b->id)>{{ $b->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-auto">
            <input type="date" name="fecha" class="form-control" value="{{ $fecha }}">
        </div>
        <div class="col-auto">
            <button class="btn btn-secondary" type="submit">Filtrar</button>
        </div>
    </form>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Beneficiario</th>
                <th>Fecha</th>
                <th>Hora</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($consultas as $consulta)
                <tr>
                    <td>{{ $consulta->beneficiario->nombre }}</td>
                    <td>{{ $consulta->fecha }}</td>
                    <td>{{ $consulta->hora }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $consultas->links() }}
</x-layout>
