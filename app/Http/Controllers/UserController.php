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
        return view('user.index', compact('user'));
    }


    public function create()
    {
        $tipoUsuarios = TipoUsuario::all();
        // return view('auth.register', compact('tipoUsuarios'));
        return view('user.create', compact('tipoUsuarios'));
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

    return redirect()->route('user.index')->with('success', 'User created successfully.');

}

public function delete(User $user)
{
    $user->delete();

    return redirect()->route('user.index')->with('success', 'Usuario eliminado exitosamente.');
}

public function edit($id)
{
    $user=User::findOrFail($id);
    // Verificar si el usuario es "superadmin" y la dirección IP coincide
    if ($user->tipo_usuario_id == '1') {
        abort(403); // Devolver un error 403 (Acceso denegado)
    }
    $tipoUsuarios = TipoUsuario::all();
    return view('user.edit', compact('user','tipoUsuarios'));
    // dd($user);
 }

 public function update(Request $request, User $user)
 {

    $user->name = $request->name;
    $user->cargo = $request->cargo;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->tipo_usuario_id = $request->tipo_usuario; // Asignar el tipo de usuario seleccionado
    $user->save();

    return redirect()->route('user.index')->with('success', 'Usuario actualizado exitosamente.');

 }

 public function show($id)
 {

 }

}


