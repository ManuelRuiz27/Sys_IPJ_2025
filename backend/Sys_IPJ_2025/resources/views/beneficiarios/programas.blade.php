<x-layout :title="'Programas de ' . $beneficiario->nombre">
    <h1 class="h3 mb-3">Programas de {{ $beneficiario->nombre }}</h1>
    <form method="POST" action="{{ route('beneficiarios.programas.update', $beneficiario) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            @foreach ($programas as $programa)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="programas[]" value="{{ $programa->id }}" id="programa{{ $programa->id }}" @checked($beneficiario->programas->contains($programa->id))>
                    <label class="form-check-label" for="programa{{ $programa->id }}">{{ $programa->nombre }}</label>
                </div>
            @endforeach
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</x-layout>
