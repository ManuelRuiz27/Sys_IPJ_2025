<x-layout title="Asignar Beca">
    <form method="POST" action="{{ route('becas.store') }}">
        @csrf
        @include('becas.form')
    </form>
</x-layout>
