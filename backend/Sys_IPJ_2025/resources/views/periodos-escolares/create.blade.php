<x-layout title="Nuevo Periodo Escolar">
    <form method="POST" action="{{ route('periodos-escolares.store') }}">
        @csrf
        @include('periodos-escolares.form')
    </form>
</x-layout>
