<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsuarioController extends Controller
{
    /**
     * List all users.
     */
    public function index()
    {
        return response()->json(User::all());
    }

    /**
     * Assign a role to the given user.
     */
    public function assignRole(Request $request, User $user)
    {
        $data = $request->validate([
            'role' => 'required|string',
        ]);

        $user->role = $data['role'];
        $user->save();

        return response()->json(['message' => 'Rol asignado correctamente']);
    }

    /**
     * Reset the user's password.
     */
    public function resetPassword(User $user)
    {
        $newPassword = Str::random(12);
        $user->password = Hash::make($newPassword);
        $user->save();

        return response()->json(['new_password' => $newPassword]);
    }
}
