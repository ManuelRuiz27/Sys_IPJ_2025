<x-layout title="Usuarios">
    <h1 class="h3 mb-3">Usuarios</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->role }}</td>
                    <td>
                        <form method="POST" action="{{ route('usuarios.assignRole', $usuario) }}" class="d-inline">
                            @csrf
                            <select name="role" class="form-select form-select-sm d-inline w-auto">
                                <option value="admin" @selected($usuario->role === 'admin')>admin</option>
                                <option value="bienestar" @selected($usuario->role === 'bienestar')>bienestar</option>
                                <option value="psicologia" @selected($usuario->role === 'psicologia')>psicologia</option>
                                <option value="nomadas" @selected($usuario->role === 'nomadas')>nomadas</option>
                            </select>
                            <button class="btn btn-sm btn-primary" type="submit">Actualizar</button>
                        </form>
                        <form method="POST" action="{{ route('usuarios.resetPassword', $usuario) }}" class="d-inline">
                            @csrf
                            <button class="btn btn-sm btn-secondary" type="submit">Restablecer contraseña</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
