<x-layout title="Editar Beca">
    <form method="POST" action="{{ route('becas.update', $beca) }}">
        @csrf
        @method('PUT')
        @include('becas.form')
    </form>
</x-layout>
