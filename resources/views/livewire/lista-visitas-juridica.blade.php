<x-slot name="header">
    <h1 class="text-gray-900">CRUD con Laravel 8 y Livewire</h1>
</x-slot>

<a class="btn btn-info mb-3" href="{{ route('visitas.create') }}">Registrar Visita</a>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
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


            {{-- <button wire:click="crear()" class="bg-green-500 hover:bg-green-600 font-bold py-2 px-4 my-3" >Nuevo</button> --}}
            <a class="btn btn-info mb-3" href="{{ route('visitas.index') }}">Persona natural</a>
            <a class="btn btn-info mb-3" href="{{ route('visitasjuridica.index') }}">Persona juridica</a>
            @if ($modal)
                @include('livewire.editarmodal')
            @endif

            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-indigo-600 text-white">
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">DESCRIPCION</th>
                        <th class="px-4 py-2">CANTIDAD</th>
                        <th class="px-4 py-2">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($visita as $visita)
                        @if ($visita->visitante->TipoVisitante->tipo_visitante == 'Persona Juridica')
                        <tr>
                            <td class="border px-4 py-2 text-center">{{ $visita->periodo->fecha }}</td>
                            <td class="border px-4 py-2 text-center">{{ $visita->visitante->nombre }}
                                {{ $visita->visitante->a_paterno }} {{ $visita->visitante->a_materno }}</td>
                            <td class="border px-4 py-2 text-center">{{ $visita->visitante->dni }}</td>
                            <td class="border px-4 py-2 text-center">{{ $visita->visitante->institucion }}</td>
                            <td class="border px-4 py-2 text-center">{{ $visita->visitante->telefono }}</td>
                            <td class="border px-4 py-2 text-center">
                                {{ $visita->periodo->hora_inicio . ' - ' . $visita->periodo->hora_fin }}</td>
                            <td class="border px-4 py-2 text-center">{{ $visita->visitante->num_visitantes }}</td>
                            <td class="border px-4 py-2 text-center">
                                {{ $visita->visitante->TipoVisitante->tipo_visitante }}</td>
                            <td class="border px-4 py-2 text-center">{{ $visita->asunto }}</td>
                            <td class="border px-4 py-2 text-center">
                                
                                <form action="{{ route('visitas.destroy', $visita) }}" method="post"
                                    style="display: inline;" class="eliminar"> @csrf @method('delete') <button
                                        type="submit" class="btn btn-outline-danger btn-sm"><i
                                            class="fas fa-lg fa-trash"></i></button></form>
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
