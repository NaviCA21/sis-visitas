@extends('adminlte::page')


@section('content_header')
    <h1 class="text-center font-weight-bold text-uppercase">Historial de visitas</h1>
@stop


@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap4.min.css">
@stop

@section('content')

<div class="card">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table table-striped" id="visita">
          <thead class="thead-dark">
            <tr>
              <th>Fecha</th>
              <th>Visitante</th>
              <th>DNI o RUC</th>
              <th>Institucion</th>
              <th>Telefono</th>
              <th>Horario</th>
              <th>N° Visitantes</th>
              <th>Tipo Visitante</th>
              <th>Asunto</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($visitas as $visita)
            <tr>
              <td>{{ $visita->periodo->fecha}}</td>
              <td>{{ $visita->visitante->nombre}} {{ $visita->visitante->a_paterno}} {{ $visita->visitante->a_materno}}</td>
              <td>{{ $visita->visitante->dni}}</td>
              <td>{{ $visita->visitante->institucion}}</td>
              <td>{{ $visita->visitante->telefono }}</td>
              <td>{{ $visita->periodo->hora_inicio}} {{ $visita->periodo->hora_fin}}</td>
              <td>{{ $visita->visitante->num_visitantes}}</td>
              <td>{{ $visita->visitante->TipoVisitante->tipo_visitante}}</td>
              <td>{{ $visita->asunto}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
  </div>
</div>
@stop

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
        buttons: [
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ],
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ]
                }
            },
        ],

    } );
    table.buttons().container()
        .appendTo( '#visita_wrapper .col-md-6:eq(0)' );
} );
</script>
@stop
