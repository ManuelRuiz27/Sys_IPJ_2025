<x-layout title="Nuevo beneficiario">
    <h1 class="mb-4">Nuevo beneficiario</h1>
    <form action="{{ route('beneficiarios.store') }}" method="POST">
        @csrf
        @include('beneficiarios.form')
    </form>
</x-layout>
