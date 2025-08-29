<x-layout title="Beneficiarios">
    <div class="d-flex justify-content-between mb-3">
        <form class="row row-cols-lg-auto g-2 align-items-center" method="GET">
            <div class="col">
                <input type="text" name="curp" class="form-control" placeholder="CURP" value="{{ $curp }}">
            </div>
            <div class="col">
                <input type="text" name="folio" class="form-control" placeholder="Folio" value="{{ $folio }}">
            </div>
            <div class="col">
                <button type="submit" class="btn btn-secondary">Filtrar</button>
            </div>
        </form>
        <a href="{{ route('beneficiarios.create') }}" class="btn btn-primary">Nuevo</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>CURP</th>
                <th>Folio</th>
                <th class="text-end">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($beneficiarios as $beneficiario)
                <tr>
                    <td>{{ $beneficiario->nombre }}</td>
                    <td>{{ $beneficiario->curp }}</td>
                    <td>{{ $beneficiario->folio_tarjeta }}</td>
                    <td class="text-end">
                        <a href="{{ route('beneficiarios.show', $beneficiario) }}" class="btn btn-sm btn-info">Ver</a>
                        <a href="{{ route('beneficiarios.edit', $beneficiario) }}" class="btn btn-sm btn-warning">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $beneficiarios->links() }}
</x-layout>
