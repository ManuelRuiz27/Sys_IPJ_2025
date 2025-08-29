<x-layout :title="'Editar grupo ' . $grupo->id">
    <h1 class="h3 mb-3">Editar grupo</h1>
    <form method="POST" action="{{ route('grupos.update', $grupo) }}">
        @csrf
        @method('PUT')
        @include('grupos.form', ['grupo' => $grupo])
    </form>
</x-layout>

