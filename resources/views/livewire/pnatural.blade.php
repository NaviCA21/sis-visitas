<div class="row">
    <div class="col-md-12 offset-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('pnatural.store') }}" method="post">
                    @csrf
                    <div class="row">

                        <div class="form-group col-md-4 mt-2">
                            <label>Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre"
                                value="{{ old('nombre') }}">
                            @error('nombre')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-4 mt-2">
                            <label>Apellido Paterno</label>
                            <input type="text" class="form-control" name="a_paterno" id="a_paterno"
                                value="{{ old('a_paterno') }}">
                            @error('a_paterno')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group col-md-4 mt-2 ">
                            <label>Apellido Materno</label>
                            <input type="text" class="form-control" name="a_materno" id="a_materno"
                                value="{{ old('a_materno') }}">
                            @error('a_materno')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group col-md-4 mt-2">
                            <label>DNI</label>
                            <input type="text" class="form-control" id="inputEmail4" name="dni"
                                value="{{ old('dni') }}">
                            @error('dni')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-4 mt-2">
                            <label>Entidad del visitantes</label>
                            <input type="text" class="form-control" id="inputEmail4" name="institucion"
                                value="{{ old('institucion') }}">
                            @error('institucion')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-4 mt-2">
                            <label>Teléfono</label>
                            <input type="tel" class="form-control" id="telefono" name="telefono"
                                placeholder="Ingrese su número de teléfono" value="{{ old('telefono') }}">
                            @error('telefono')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group col-md-4 mt-2">
                            <label>Número de visitantes</label>
                            <input type="number" class="form-control" name="num_visitantes"
                                placeholder="Ingrese el número de visitantes" value="{{ old('num_visitantes') }}"
                                min="1">
                            @error('num_visitantes')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- <div class="form-group col-md-4 mt-2">
                            <label>Fecha</label>
                            <input wire:model="search" type="date" class="form-control" id="fecha" name="fecha"
                                placeholder="Ingrese la fecha" value="{{ old('fecha') }}">
                            @error('fecha')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div> --}}


                        {{-- <div class="form-group row">
                            <label for="vive_apoderado" class="col-sm-4 col-form-label">Vive</label>
                            <div class="col-sm-8">
                                <select name="vive_apoderado" class="form-control" wire:model="vive" id="vive_apoderado">
                                    <option value="NO">No</option>
                                    <option value="SI">Si</option>
                                </select>
                            </div>
                        </div> --}}

                        <div class="form-group row">
                            <label for="vive_apoderado" class="col-sm-4 col-form-label">Fecha</label>
                            <div class="col-sm-8">
                                {{-- <select name="vive_apoderado" class="form-control" wire:model="vive" id="vive_apoderado">
                                    <option value="NO">No</option>
                                    <option value="SI">Si</option>
                                </select> --}}

                                <input type="date" class="form-control" wire:model="vive" id="fecha" name="fecha"
                                    placeholder="Ingrese la fecha" value="">

                                @error('fecha')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{ $vive }}

                        <input type="hidden" value="{{ $vive  }}">

                        @if($vive == 'SI')
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="grado_instruccion_apoderado" class="col-sm-4 col-form-label">Grado de instruccion</label>
                                        <div class="col-sm-8">
                                            <input type="button" name="grado_instruccion_apoderado" value="09:00:00" class="form-control" id="grado_instruccion_apoderado">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endif

{{--
                        <div class="form-group col-md-4 mt-2">
                            <label>Hora de inicio</label>
                            <input type="time" class="form-control" id="hora_inicio" name="hora_inicio"
                                placeholder="Ingrese la hora de inicio" value="{{ old('hora_inicio') }}">
                            @error('hora_inicio')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group col-md-4 mt-2">
                            <label>Hora de fin</label>
                            <input type="time" class="form-control" id="hora_fin" name="hora_fin"
                                placeholder="Ingrese la hora de inicio" value="{{ old('hora_fin') }}">
                            @error('hora_fin')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div> --}}

                        {{-- <div class="form-group col-md-4">
                        <label class="mb-3">Tipo Visitante</label>
                            <select class="form-control" name="tipo">
                                <option>Seleccionar...</option>
                                <option value="Persona Juridica">Persona Juridica</option>
                                <option value="Persona Natural">Persona Natural</option>
                            </select>
                        </div>
                        @error('tipo')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror --}}

                        {{-- <div class="form-group col-md-4">
                            <label class="mb-3">Asunto</label>
                            <select class="selectpicker form-control dropup" data-dropup-auto="false"
                                    data-style="btn-default" data-size="5" data-live-search="true" name="asunto">
                                <option>Seleccionar...</option>
                                <option value="Mercados">Mercados</option>
                                <option value="Atención a la población">Atención a la población</option>
                                <option value="Barrios">Barrios</option>
                                <option value="Limpieza">Limpieza</option>
                                <option value="Mantenimiento de vías">Mantenimiento de vías</option>
                                <option value="Transporte">Transportes</option>
                                <option value="otros">Otros</option>
                            </select>

                            <div id="otros-asunto" style="display: none;">
                                <label class="mt-3">Especificar otro asunto:</label>
                                <input type="text" class="form-control" name="otros_asunto">
                            </div>

                        </div> --}}

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

                            // Actualizar valor del campo de texto cuando se envía el formulario
                            var form = document.querySelector('form');
                            form.addEventListener('submit', function() {
                                if (select.value === 'otros') {
                                    var otrosAsunto = document.querySelector('[name="otros_asunto"]');
                                    otrosAsunto.value = otrosAsunto.value.trim();
                                    select.value = otrosAsunto.value === '' ? 'otros' : otrosAsunto.value;
                                }
                            });
                        </script>
                    </div>

                    <div class="row justify-content-center">
                        <a href="{{ route('visitas.index') }}" class="btn btn-info m-3 col-md-3 p-1">Regresar</a>
                        <button type="submit" class="btn btn-success m-3 col-md-3">Enviar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
