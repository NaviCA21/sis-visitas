<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\TipoUsuario;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    //
    public function index()
    {
        $user = User::all();
        return view('usuario', compact('user'));
    }


    public function create()
    {
        $tipoUsuarios = TipoUsuario::all();
         return view('auth.register', compact('tipoUsuarios'));
        //  dd($tipoUsuarios);
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'cargo' => ['required', 'string', 'max:255'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'tipo_usuario' => ['required', 'exists:tipo_usuarios,id']
    ]);

    $user = new User;
    $user->name = $request->name;
    $user->cargo = $request->cargo;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->tipo_usuario_id = $request->tipo_usuario; // Asignar el tipo de usuario seleccionado
    $user->save();
    // dd($user);

    // enviar correo electrónico de bienvenida
    // Mail::to($user->email)->send(new WelcomeEmail($user));

    return redirect()->route('usuario.index')->with('success', 'User created successfully.');

}

public function delete(User $user)
{
    $user->delete();

    return redirect()->route('usuario.index')->with('success', 'Usuario eliminado exitosamente.');
}

}

