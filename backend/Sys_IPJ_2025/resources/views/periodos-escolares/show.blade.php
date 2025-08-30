<x-layout title="Periodo Escolar">
    <div class="mb-3">
        <p><strong>Nombre:</strong> {{ $periodo->nombre }}</p>
        <p><strong>Inicio:</strong> {{ $periodo->fecha_inicio }}</p>
        <p><strong>Fin:</strong> {{ $periodo->fecha_fin }}</p>
    </div>
    <div class="mb-3">
        <a href="{{ route('periodos-escolares.edit', $periodo) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('periodos-escolares.index') }}" class="btn btn-secondary">Volver</a>
    </div>
    <hr>
    <h2>Becas</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Beneficiario</th>
                <th>Porcentaje</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($periodo->becas as $beca)
                <tr>
                    <td>{{ $beca->beneficiario->nombre }}</td>
                    <td>{{ $beca->porcentaje }}%</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
