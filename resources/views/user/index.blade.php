@extends('adminlte::page')

@section('content')
<div class="row">
  <div class="col-md-6">
    <h1>Lista de usuarios</h1>
  </div>
  <div class="col-md-6 text-right">
    <a href="{{ route('register.create') }}" class="btn btn-primary mt-4 ml-auto">Registrar nuevo usuario</a>
  </div>
</div>

<div class="card mt-4">
  <div class="card-body">
    <table id="example2" class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>Nombre del usuario</th>
          <th>email</th>
          <th>cargo</th>
          <th>Tipo de usuario</th>
          <th>Fecha de creación</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($user as $user)
          <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->cargo }}</td>
            <td>{{ $user->tipoUsuario->tipo_usuario }}</td>
            <td>{{ $user->updated_at }}</td>
            <td class="py-3 px-2 text-center">
              <div class="d-flex justify-content-center align-items-center">
                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary mr-2">
                  <i class="fas fa-pencil-alt"></i>
                </a>
                <form action="{{ route('user.delete', $user->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger mr-2">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                </form>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
