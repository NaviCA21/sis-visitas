@extends('adminlte::page')

@section('content_header')
    <h1 class="text-center font-weight-bold text-uppercase">Lista de usuarios</h1>
@stop

@section('content')

@if(auth()->user()->tipo_usuario_id=='1')
<div class="row">
  <div class="col-md-6">
    <h1>Lista de usuarios</h1>
  </div>
  <div class="col-md-6 text-right">
    <a href="{{ route('user.create') }}" class="btn btn-primary mt-4 ml-auto">Registrar nuevo usuario</a>
  </div>
</div>

<div class="card mt-4">
  <div class="card-body">
    <div class="table-responsive">
    <table id="userTable" class="table table-striped">
      <thead class="thead-dark">
        <tr>
          <th>Nombre del usuario</th>
          <th>Email</th>
          <th>Cargo</th>
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
</div>
@endif
@endsection

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@stop

@section('js')
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

<script>
$(document).ready(function() {
    $('#userTable').DataTable({
        responsive: true,
        language: {
            url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
    });
});
</script>
@stop
