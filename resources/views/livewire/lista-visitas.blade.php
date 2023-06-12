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
                                    <th class="px-4 py-2">Acciones</th>
                                    <th class="px-4 py-2">Fecha</th>
                                    <th class="px-4 py-2">Visitante</th>
                                    <th class="px-4 py-2">DNI</th>
                                    <th class="px-4 py-2">Institución</th>
                                    <th class="px-4 py-2">Teléfono</th>
                                    <th class="px-4 py-2">Horario</th>
                                    <th class="px-4 py-2">N° Visitantes</th>
                                    <th class="px-4 py-2">Tipo Visitante</th>
                                    <th class="px-4 py-2">Asunto</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($visita as $visita)
                                    @if ($visita->visitante->TipoVisitante->tipo_visitante == 'Persona Natural')
                                    <tr>
                                        <td class="border px-4 py-2">
                                            <div class="d-flex align-items-center">
                                                <button wire:click="editar({{ $visita->id }})" class="btn btn-primary btn-sm mr-2">
                                                    <i class="fas fa-edit"></i>
                                                </button>

                                                <form action="{{ route('visitas.destroy', $visita) }}" method="post" style="display: inline;">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>

                                        </td>
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

@section('js')
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>
@if(session('eliminar') == 'delete')
<script>
 Swal.fire(
          '¡Eliminado!',
          'El registro ha sido eliminado.',
          'success'
        )
</script>
@endif
<script>
  $('.eliminar').submit(function(e){
    e.preventDefault();

    Swal.fire({
      title: '¿Estas seguro?',
      text: "No podrás revertir esto!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: '¡Si, eliminarlo!',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.isConfirmed) {

        this.submit();
      }
    })

  });

  $(document).ready(function() {
    var table = $('#visita').DataTable({
    order: [[2, 'desc']],
    responsive: true,
    autoWidth: false,
    lengthChange: true,
    language: {
      search: "Buscar:",
      lengthMenu: "Mostrar _MENU_ registros por página",
      zeroRecords: "No se encontraron registros",
      info: "Mostrando página _PAGE_ de _PAGES_",
      infoEmpty: "No hay registros disponibles",
      infoFiltered: "(filtrados de un total de _MAX_ registros)",
      paginate: {
        first: "Primero",
        previous: "Anterior",
        next: "Siguiente",
        last: "Último",
      },
    },
    } );
    table.buttons().container()
        .appendTo( '#visita_wrapper .col-md-6:eq(0)' );
} );
</script>
@stop

