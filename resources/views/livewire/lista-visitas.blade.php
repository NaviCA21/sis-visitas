<x-slot name="header">
    <h1 class="text-gray-900">CRUD con Laravel 8 y Livewire</h1>
</x-slot>

<div class="py-12">
    <a class="btn btn-info mb-3" href="{{ route('visitas.create') }}">Registrar Visita</a>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

            @if (session()->has('message'))
                <div class="bg-teal-100 rounded-b text-teal-900 px-4 py-4 shadow-md my-3" role="alert">
                    <div class="flex">
                        <div>
                            <h4>{{ session('message') }}</h4>
                        </div>
                    </div>
                </div>
            @endif

            <div class="text-center">
                <div class="btn-group mb-3">
                    <a class="btn {{ request()->is('visitas') ? 'btn-primary' : 'btn-info' }}" href="{{ route('visitas.index') }}">Persona natural</a>
                    <a class="btn btn-info" href="{{ route('visitasjuridica.index') }}">Persona juridica</a>
                </div>
            </div>
            
                     
            @if ($modal)
                @include('livewire.editarmodal')
            @endif
            
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="visita">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="px-4 py-2">Fecha</th>
                                    <th class="px-4 py-2">Visitante</th>
                                    <th class="px-4 py-2">DNI</th>
                                    <th class="px-4 py-2">Institución</th>
                                    <th class="px-4 py-2">Teléfono</th>
                                    <th class="px-4 py-2">Horario</th>
                                    <th class="px-4 py-2">N° Visitantes</th>
                                    <th class="px-4 py-2">Tipo Visitante</th>
                                    <th class="px-4 py-2">Asunto</th>
                                    <th class="px-4 py-2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($visita as $visita)
                                    @if ($visita->visitante->TipoVisitante->tipo_visitante == 'Persona Natural')
                                    <tr>
                                        <td class="border px-4 py-2">{{ $visita->periodo->fecha }}</td>
                                        <td class="border px-4 py-2">{{ $visita->visitante->nombre }}
                                            {{ $visita->visitante->a_paterno }} {{ $visita->visitante->a_materno }}</td>
                                        <td class="border px-4 py-2">{{ $visita->visitante->dni }}</td>
                                        <td class="border px-4 py-2">{{ $visita->visitante->institucion }}</td>
                                        <td class="border px-4 py-2">{{ $visita->visitante->telefono }}</td>
                                        <td class="border px-4 py-2">
                                            {{ $visita->periodo->hora_inicio . ' - ' . $visita->periodo->hora_fin }}</td>
                                        <td class="border px-4 py-2">{{ $visita->visitante->num_visitantes }}</td>
                                        <td class="border px-4 py-2">{{ $visita->visitante->TipoVisitante->tipo_visitante }}</td>
                                        <td class="border px-4 py-2">{{ $visita->asunto }}</td>
                                        <td class="border px-4 py-2">
                                            <button wire:click="editar({{ $visita->id }})"
                                                class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4">Editar</button>
                                            <form action="{{ route('visitas.destroy', $visita) }}" method="post"
                                                style="display: inline;" class="eliminar">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-outline-danger btn-sm">
                                                    <i class="fas fa-lg fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @else

                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
