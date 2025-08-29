<x-layout :title="$beneficiario->nombre">
    <div class="mb-3">
        <h1>{{ $beneficiario->nombre }}</h1>
        <p class="text-muted">CURP: {{ $beneficiario->curp }} | Folio: {{ $beneficiario->folio_tarjeta }}</p>
    </div>
    <div class="mb-4">
        <h2 class="h5">Domicilio</h2>
        @if ($beneficiario->domicilio)
            <p>{{ $beneficiario->domicilio->calle }} {{ $beneficiario->domicilio->numero }}, {{ $beneficiario->domicilio->colonia }}, CP {{ $beneficiario->domicilio->cp }}</p>
        @else
            <p class="text-muted">Sin domicilio registrado</p>
        @endif
    </div>
    <div class="mb-4">
        <h2 class="h5">Programas</h2>
        @if ($beneficiario->programas->count())
            <ul class="list-group">
                @foreach ($beneficiario->programas as $programa)
                    <li class="list-group-item">{{ $programa->nombre }}</li>
                @endforeach
            </ul>
        @else
            <p class="text-muted">Sin programas vinculados</p>
        @endif
        <a href="{{ route('beneficiarios.programas.edit', $beneficiario) }}" class="btn btn-sm btn-primary mt-2">Asignar programas</a>
    </div>
    <a href="{{ route('beneficiarios.index') }}" class="btn btn-secondary">Regresar</a>
    <a href="{{ route('beneficiarios.edit', $beneficiario) }}" class="btn btn-primary">Editar</a>
</x-layout>
