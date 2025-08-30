<x-layout title="Beca">
    <div class="mb-3">
        <p><strong>Periodo:</strong> {{ $beca->periodoEscolar->nombre }}</p>
        <p><strong>Beneficiario:</strong> {{ $beca->beneficiario->nombre }}</p>
        <p><strong>Porcentaje:</strong> {{ $beca->porcentaje }}%</p>
    </div>
    <div class="mb-3">
        <a href="{{ route('becas.edit', $beca) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('becas.index') }}" class="btn btn-secondary">Volver</a>
    </div>
</x-layout>
