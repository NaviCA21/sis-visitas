@extends('adminlte::page')

@section('content')
<a href="{{{ route('register.create') }}}" class="btn btn-primary mt-4">Registrar</a>
<div class="card mt-4">
    <div class="card-header">
      <h3 class="card-title">Lista de usuarios</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Nombre del usuario</th>
          <th>Cargo</th>
          <th>Email</th>
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
            <td>{{$user->tipoUsuario->tipo_usuario}}</td>
            <td> {{ $user->updated_at }}</td>
            <td class="py-3 px-2 text-center">

                <div class="d-flex justify-content-center align-items-center">
                    <a href="#" class="btn btn-primary mr-2">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                    <form action="{{route('user.delete', $user->id)}}" method="POST">
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
    <!-- /.card-body -->
  </div>
<div class="py-12">
                  </tbody>
                </table>
              </div>
@endsection
