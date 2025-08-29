<x-layout title="Programas">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Programas</h1>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($programas as $programa)
                <tr>
                    <td>{{ $programa->nombre }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $programas->links() }}
</x-layout>
