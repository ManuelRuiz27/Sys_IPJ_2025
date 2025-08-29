<x-layout title="Nueva consulta psicológica">
    <h1 class="mb-4">Nueva consulta psicológica</h1>
    <form action="{{ route('consultas-psicologicas.store') }}" method="POST">
        @csrf
        @php($consulta = null)
        @include('consultas-psicologicas.form')
    </form>
</x-layout>
