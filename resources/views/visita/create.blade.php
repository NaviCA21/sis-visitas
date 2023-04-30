@extends('adminlte::page')

@section('title', 'Registrar Visita')

@section('content_header')
    <h1 class="text-center font-weight-bold text-uppercase">Registrar Visita</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('visita.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group col-md-12 mt-2">

                            <div class="form-group col-md-12 mt-2">
                                <label>Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="nombre"
                                    value="{{ old('nombre') }}" onkeyup="string_to_slug()">
                                @error('nombre')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-12 mt-2">
                                <label>Apellido Paterno</label>
                                <input type="text" class="form-control" name="a_paterno" id="a_paterno"
                                    value="{{ old('a_paterno') }}" onkeyup="string_to_slug()">
                                @error('a_paterno')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-12 mt-2 ">
                                <label>Apellido Materno</label>
                                <input type="text" class="form-control" name="a_materno" id="a_materno"
                                    value="{{ old('a_materno') }}" onkeyup="string_to_slug()">
                                @error('a_materno')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-12 mt-2">
                                <label>DNI</label>
                                <input type="text" class="form-control" id="inputEmail4" name="dni"
                                    value="{{ old('dni') }}">
                                @error('dni')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-12 mt-2">
                                <label>Entidad del visitantes</label>
                                <input type="text" class="form-control" id="inputEmail4" name="institucion"
                                    value="{{ old('institucion') }}">
                                @error('institucion')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-12 mt-2">
                                <label>Teléfono</label>
                                <input type="tel" class="form-control" id="telefono" name="telefono"
                                    placeholder="Ingrese su número de teléfono" value="{{ old('telefono') }}" required>
                                <small>Ejemplo: 123-456-7890</small>
                                @error('telefono')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-12 mt-2">
                                <label>Número de visitantes</label>
                                <input type="number" class="form-control" id="num_visitantes" name="num_visitantes"
                                    placeholder="Ingrese el número de visitantes" value="{{ old('num_visitantes') }}"
                                    min="1" required>
                                @error('num_visitantes')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-12 mt-2">
                                <label>Fecha</label>
                                <input type="date" class="form-control" id="fecha" name="fecha"
                                    placeholder="Ingrese la fecha" value="{{ old('fecha') }}" required>
                                @error('fecha')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-12 mt-2">
                                <label>Hora de inicio</label>
                                <input type="time" class="form-control" id="hora_inicio" name="hora_inicio"
                                    placeholder="Ingrese la hora de inicio" value="{{ old('hora_inicio') }}" required>
                                @error('hora_inicio')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-12 mt-2">
                                <label>Hora de fin</label>
                                <input type="time" class="form-control" id="hora_fin" name="hora_fin"
                                    placeholder="Ingrese la hora de inicio" value="{{ old('hora_fin') }}" required>
                                @error('hora_fin')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>



                            <label class="mb-3">Asunto</label>
                            <select class="selectpicker form-control dropup" data-dropup-auto="false"
                                data-style="btn-default" data-size="5" data-live-search="true" name="asunto">
                                <option>Seleccionar...</option>
                                <option>Mercados</option>
                                <option>Atención a la población</option>
                                <option>Barrios</option>
                                <option>Limpieza</option>
                                <option>Mantenimiento de vías</option>
                                <option>Transportes</option>
                                <option value="otros">Otros</option>
                            </select>

                            <div id="otros-asunto" style="display: none;">
                                <label class="mt-3">Especificar otro asunto:</label>
                                <input type="text" class="form-control" name="otros-asunto">
                            </div>

                            <script>
                                // Mostrar u ocultar el campo de texto según la opción seleccionada
                                var select = document.querySelector('[name="asunto"]');
                                var otrosDiv = document.querySelector('#otros-asunto');
                                select.addEventListener('change', function() {
                                    if (select.value === 'otros') {
                                        otrosDiv.style.display = 'block';
                                    } else {
                                        otrosDiv.style.display = 'none';
                                    }
                                });
                            </script>




                            @error('autor')
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

@section('js')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script> --}}

    <script>
        $(function() {
            $('select').selectpicker();
        });

        function string_to_slug() {

            titulo = document.getElementById("nombre").value;
            titulo = titulo.replace(/^\s+|\s+$/g, '');
            titulo = titulo.toLowerCase();
            var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
            var to = "aaaaeeeeiiiioooouuuunc------";
            for (var i = 0, l = from.length; i < l; i++) {
                titulo = titulo.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
            }
            titulo = titulo.replace(/[^a-z0-9 -]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');

            document.getElementById('slug').value = titulo;

        }
    </script>
@stop
