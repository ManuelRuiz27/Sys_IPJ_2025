<x-layout title="Periodos Escolares">
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('periodos-escolares.create') }}" class="btn btn-primary">Nuevo</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Inicio</th>
                <th>Fin</th>
                <th class="text-end">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($periodos as $periodo)
                <tr>
                    <td>{{ $periodo->nombre }}</td>
                    <td>{{ $periodo->fecha_inicio }}</td>
                    <td>{{ $periodo->fecha_fin }}</td>
                    <td class="text-end">
                        <a href="{{ route('periodos-escolares.show', $periodo) }}" class="btn btn-sm btn-info">Ver</a>
                        <a href="{{ route('periodos-escolares.edit', $periodo) }}" class="btn btn-sm btn-warning">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $periodos->links() }}
</x-layout>
