@extends('adminlte::page')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3 mt-5">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('visita.update', $visita) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-row">
                            
                            <div class="form-group col-md-6 mt-2">
                                <label>Fecha</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Ingrese la fecha"
                                       value="{{ old('fecha') }}" required>
                                @error('fecha')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            
                            <div class="form-group col-md-6 mt-2">
                                <label>Hora de inicio</label>
                                <input type="time" class="form-control" id="hora_inicio" name="hora_inicio" placeholder="Ingrese la hora de inicio"
                                       value="{{ old('hora_inicio') }}" required>
                                @error('hora_inicio')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-6 mt-2">
                                <label>Hora de fin</label>
                                <input type="time" class="form-control" id="hora_fin" name="hora_fin" placeholder="Ingrese la hora de inicio"
                                       value="{{ old('hora_fin') }}" required>
                                @error('hora_fin')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        <div class="row justify-content-center">
                            <a href="{{ route('informes.index') }}" class="btn btn-info m-3 col-md-3 p-1">Regresar</a>
                            <button type="submit" class="btn btn-success m-3 col-md-3">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
            {{-- <div class="shadow p-5 mb-5 bg-white rounded">
        
    </div> --}}

        </div>
    </div>
@stop