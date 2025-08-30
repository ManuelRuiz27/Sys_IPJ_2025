<x-layout title="Becas">
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('becas.create') }}" class="btn btn-primary">Nuevo</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Periodo</th>
                <th>Beneficiario</th>
                <th>Porcentaje</th>
                <th class="text-end">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($becas as $beca)
                <tr>
                    <td>{{ $beca->periodoEscolar->nombre }}</td>
                    <td>{{ $beca->beneficiario->nombre }}</td>
                    <td>{{ $beca->porcentaje }}%</td>
                    <td class="text-end">
                        <a href="{{ route('becas.show', $beca) }}" class="btn btn-sm btn-info">Ver</a>
                        <a href="{{ route('becas.edit', $beca) }}" class="btn btn-sm btn-warning">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $becas->links() }}
</x-layout>
