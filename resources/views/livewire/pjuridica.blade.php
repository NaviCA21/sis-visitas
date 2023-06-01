<div class="row">
    <div class="col-md-12 offset-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('pjuridica.store') }}" method="post">
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
                            <label>RUC</label>
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


                        
                        <div class="form-group col-md-4 mt-2">
                            <label>Asunto</label>
                            <input type="text" class="form-control" name="asunto"
                                placeholder="Ingrese el asunto" value="{{ old('asunto') }}"
                                min="1">
                            @error('asunto')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        
                        <div class="form-group col-md-4 mt-2">
                            <label>Fecha</label>

                            <input type="date" class="form-control" wire:model="fecha_live_wire" id="fecha" name="fecha"
                                placeholder="Ingrese la fecha" value="">

                            <input type="hidden" class="form-control" wire:model="search" value="">

                            @error('fecha')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                        </div>


                        <input type="hidden" value="{{ $dayOfWeek = date("l", strtotime($fecha_live_wire));  }}">





                        @if($dayOfWeek == 'Tuesday')

                            <div class="form-group col-md-4 mt-2">
                                <label>Horario</label>

                                <div class="row justify-content-center">

                                    <select id="hora_inicio" name="hora_inicio" class="form-control">

                                        @foreach($horarios_libres as $horario)
                                            <option value="{{$horario}}">{{$horario}}</option>

                                        @endforeach

                                    </select>

                                </div>

                            </div>

                        @elseif($dayOfWeek == 'Thursday')

                            <div class="form-group col-md-4 mt-2">
                                <label>Horario</label>

                                <div class="row justify-content-center">

                                    <select id="hora_inicio" name="hora_inicio" class="form-control">

                                        @foreach($horarios_libres as $horario)
                                            <option value="{{$horario}}">{{$horario}}</option>

                                        @endforeach

                                    </select>

                                </div>

                            </div>

                        @elseif($dayOfWeek == 'Monday' || $dayOfWeek == 'Wednesday' || $dayOfWeek == 'Firday')
                            <div class="form-group col-md-4 mt-2">
                                <label>AVISO.</label>
                                <div class="row justify-content-center">
                                    LUNES, MARTES Y MIERCOLES RESERVADO PARA PERSONA NATURAL.
                                </div>

                            </div>

                        @else
                            <div class="form-group col-md-4 mt-2">
                                <label>AVISO.</label>

                                <div class="row justify-content-center">
                                    SABADO Y DOMINGO NO SE DEBE RESERVAR.
                                </div>

                            </div>

                        @endif  
                        
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