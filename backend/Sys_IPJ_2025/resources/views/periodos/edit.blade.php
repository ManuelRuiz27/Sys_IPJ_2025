<x-layout :title="'Editar periodo ' . $periodo->mes . '/' . $periodo->anio">
    <h1 class="h3 mb-3">Editar periodo</h1>
    <form method="POST" action="{{ route('periodos.update', $periodo) }}">
        @csrf
        @method('PUT')
        @include('periodos.form', ['periodo' => $periodo])
    </form>
</x-layout>

