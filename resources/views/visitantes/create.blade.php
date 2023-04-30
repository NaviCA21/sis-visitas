@extends('adminlte::page')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('visita.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6 mt-2">
                                <label>Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre"
                                    value="{{ old('nombre') }}" onkeyup="string_to_slug()">
                                @error('nombre')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 mt-2">
                                <label>Apellido Paterno</label>
                                <input type="text" class="form-control" name="a_paterno" id="a_paterno"
                                    value="{{ old('a_paterno') }}" onkeyup="string_to_slug()">
                                @error('a_paterno')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 mt-2">
                                <label>Apellido Materno</label>
                                <input type="text" class="form-control" name="a_materno" id="a_materno"
                                    value="{{ old('a_materno') }}" onkeyup="string_to_slug()">
                                @error('a_materno')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-6 mt-2">
                                <label>DNI</label>
                                <input type="text" class="form-control" id="inputEmail4" name="dni"
                                    value="{{ old('dni') }}">
                                @error('dni')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 mt-2">
                                <label>Entidad del visitantes</label>
                                <input type="text" class="form-control" id="inputEmail4" name="institucion"
                                    value="{{ old('institucion') }}">
                                @error('institucion')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 mt-2">
                                <label>Teléfono</label>
                                <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Ingrese su número de teléfono"
                                       value="{{ old('telefono') }}" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
                                <small>Ejemplo: 123-456-7890</small>
                                @error('telefono')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-6 mt-2">
                                <label>Número de visitantes</label>
                                <input type="number" class="form-control" id="num_visitantes" name="num_visitantes" placeholder="Ingrese el número de visitantes"
                                       value="{{ old('num_visitantes') }}" min="1" required>
                                @error('num_visitantes')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div> 
                             
                        <div class="row justify-content-center">
                            <a href="{{ route('visita.index') }}" class="btn btn-info m-3 col-md-3 p-1">Regresar</a>
                            <button type="submit" class="btn btn-success m-3 col-md-3">Enviar</button>
                        </div>

                    </form>
                </div>
            </div>
            {{-- 
    <div class="shadow p-5 mb-5 bg-white rounded">
        
    </div> --}}
        </div>
    </div>
@stop

