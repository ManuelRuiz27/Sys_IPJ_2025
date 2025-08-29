<x-layout title="Editar beneficiario">
    <h1 class="mb-4">Editar beneficiario</h1>
    <form action="{{ route('beneficiarios.update', $beneficiario) }}" method="POST">
        @csrf
        @method('PUT')
        @include('beneficiarios.form', ['beneficiario' => $beneficiario])
    </form>
</x-layout>
