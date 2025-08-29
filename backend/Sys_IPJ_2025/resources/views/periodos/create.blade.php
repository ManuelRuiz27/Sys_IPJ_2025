<x-layout title="Nuevo periodo">
    <h1 class="h3 mb-3">Nuevo periodo</h1>
    <form method="POST" action="{{ route('periodos.store') }}">
        @csrf
        @include('periodos.form')
    </form>
</x-layout>

