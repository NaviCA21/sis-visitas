<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <form>
                    <div class="row">

                        <div class="form-group col-md-4 mt-2">
                            <label>Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre"
                                value="{{ old('nombre') }}" wire:model="nombre">
                            @error('nombre')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-4 mt-2">
                            <label>Apellido Paterno</label>
                            <input type="text" class="form-control" name="a_paterno" id="a_paterno"
                                value="{{ old('a_paterno') }}" wire:model="a_paterno">
                            @error('a_paterno')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group col-md-4 mt-2 ">
                            <label>Apellido Materno</label>
                            <input type="text" class="form-control" name="a_materno" id="a_materno"
                                value="{{ old('a_materno') }}" wire:model="a_materno">
                            @error('a_materno')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group col-md-4 mt-2">
                            <label>DNI</label>
                            <input type="text" class="form-control" id="dni" name="dni" value="{{ old('dni') }}" maxlength="8" placeholder="Ingrese el DNI (8 dígitos)"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')" required wire:model="dni">
                            @error('dni')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group col-md-4 mt-2">
                            <label>Entidad del visitantes</label>
                            <input type="text" class="form-control" id="institucion" name="institucion"
                                value="{{ old('institucion') }}" placeholder="Ingrese la entidad del visitante" wire:model="institucion">
                            @error('institucion')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group col-md-4 mt-2">
                            <label>Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }} " maxlength="9"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')" placeholder="Ingrese el número de teléfono" required wire:model="telefono">
                            @error('telefono')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group col-md-4 mt-2">
                            <label>Número de visitantes</label>
                            <input type="number" class="form-control" name="num_visitantes"
                                placeholder="Ingrese el número de visitantes" value="{{ old('num_visitantes') }}"
                                min="1" wire:model="num_visitantes">
                            @error('num_visitantes')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group col-md-4 mt-2">
                            <label>Asunto</label>
                            <input type="text" class="form-control" name="asunto"
                                placeholder="Ingrese el asunto" value="{{ old('asunto') }}"
                                min="1" wire:model="asunto">
                            @error('asunto')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group col-md-4 mt-2">
                            <label>Fecha</label>

                            <input type="date" class="form-control" wire:model="fecha_live_wire" id="fecha" name="fecha"
                                placeholder="Ingrese la fecha" value="" wire:model="fecha">

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

                                        @foreach($horarios_libresjuridica as $horario)
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

                                        @foreach($horarios_libresjuridica as $horario)
                                            <option value="{{$horario}}">{{$horario}}</option>

                                        @endforeach

                                    </select>

                                </div>

                            </div>

                        @elseif($dayOfWeek == 'Monday' || $dayOfWeek == 'Wednesday' || $dayOfWeek == 'Friday')
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


                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                <button wire:click="actualizarjuridica()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-purple-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-purple-800 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">Guardar</button>
                            </span>

                            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                <button wire:click="cerrarModal()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-gray-200 text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">Cancelar</button>
                            </span>
                        </div>
                    </div>


                </form>
            </div>


    </div>
</div>
