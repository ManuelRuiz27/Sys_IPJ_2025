<x-layout title="Editar Periodo Escolar">
    <form method="POST" action="{{ route('periodos-escolares.update', $periodo) }}">
        @csrf
        @method('PUT')
        @include('periodos-escolares.form')
    </form>
</x-layout>
