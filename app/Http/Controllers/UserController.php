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

    return redirect()->route('admin.admin')->with('success', 'User created successfully.');
}

public function create()
{
    $tipo_usuarios = TipoUsuario::all();
    return view('auth.register', compact('tipo_usuarios'));
    // dd($tipo_usuarios);
}
public function delete(User $user)
{
    $user->delete();

    return redirect()->route('admin.admin')->with('success', 'Usuario eliminado exitosamente.');
}

public function edit(User $user)
{
     $tipo_usuario = TipoUsuario::all();
     return view('auth.update', compact('user', 'tipo_usuario'));
 }


public function update(Request $request, User $user)
{

    $user->name = $request->name;
    $user->cargo = $request->cargo;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->tipo_usuario_id = $request->tipo_usuario; // Asignar el tipo de usuario seleccionado
    $user->save();

    return redirect()->route('admin.admin')->with('success', 'Usuario actualizado exitosamente.');
}

// public function update(request $request, User $user)
// {
//     // $user=User::findOrfail($id);
//     $data = $request->only('name', 'cargo', 'email');
//     $password = $request->Input('password');
//     if($password)
//         $data['password'] = bcrypt($password);
//     $user->tipo_usuario_id = $request->tipo_usuario_id;
//     $user->update($data);
//     return redirect()->route('admin.admin');

// }
}
