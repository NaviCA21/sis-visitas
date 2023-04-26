@extends('adminlte::page')

@section('content')

<div class="card">
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
            <td>X</td>
            </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
<div class="py-12">


                    {{-- @foreach ($user as $item)
                      <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-2 text-left">{{ $item->name}}</td>
                        <td class="py-3 px-2 text-left">{{ $item->cargo}}</td>
                        <td class="py-3 px-2 text-left">{{ $item->email}}</td> --}}
                        {{-- <td class="py-3 px-2 text-left">{{ $item->password}}</td> --}}
                        {{-- <td class="py-3 px-2 text-left">{{ $item->tipo_usuario->tipo_usuario}}</td> --}}
                        {{-- <td class="py-3 px-2 text-left">{{ $item->created_at}}</td>
                        <td class="py-3 px-2 text-center"> --}}
                        {{-- <form action="#" method="POST">
                            @csrf
                            @method('UPDATE')
                            <button class="text-indigo-600 hover:text-indigo-900 mr-5">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                        </form> --}}

                        {{-- <<div class="d-flex justify-content-center align-items-center">
                            <a href="{{ route('user.edit', $item->id) }}" class="btn btn-primary mr-2">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form action="{{ route('user.delete', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mr-2">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div> --}}



{{--
                        </td>
                      </tr>
                    @endforeach --}}
                  </tbody>
                </table>
              </div>
@endsection
