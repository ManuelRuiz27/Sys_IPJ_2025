<x-layout title="Nuevo grupo">
    <h1 class="h3 mb-3">Nuevo grupo</h1>
    <form method="POST" action="{{ route('grupos.store') }}">
        @csrf
        @include('grupos.form')
    </form>
</x-layout>

