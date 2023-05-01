@extends('adminlte::page')


@section('content_header')
    <h1 class="text-center font-weight-bold text-uppercase">Registro de visitas</h1>
@stop

@section('content')
@can('visita.create')
{{-- <a class="btn btn-info mb-3" href="{{route('visita.create')}}">Registrar Visita</a> --}}
@endcan
<a class="btn btn-info mb-3" href="{{route('visita.create')}}">Registrar Visita</a>
<div class="card">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table table-striped" id="visita">
          <thead class="thead-dark">
            <tr>
              <th>Fecha</th>
              <th>Visitante</th>
              <th>DNI</th>
              <th>Institucion</th>
              <th>Telefono</th>
              <th>Hora de ingreso</th>
              <th>Hora de salida</th>
              <th>N° Visitantes</th>
              <th>Tipo Visitante</th>
              <th>Asunto</th>
              <th>Acciones</th>
              @can('visitas.edit','visitas.destroy')
              @endcan
            </tr>
          </thead>
          <tbody>
            @foreach ($visita as $item)
            <tr>
              <td>{{ $item->periodo->fecha}}</td>
              <td>{{ $item->visitante->nombre}} {{ $item->visitante->a_paterno}} {{ $item->visitante->a_materno}}</td>
              <td>{{ $item->visitante->dni}}</td>
              <td>{{ $item->visitante->institucion}}</td>
              <td>{{ $item->visitante->telefono }}</td>
              <td>{{ $item->periodo->hora_inicio}}</td>
              <td>{{ $item->periodo->hora_fin}}</td>
              <td>{{ $item->visitante->num_visitantes}}</td>
              <td>{{ $item->visitante->TipoVisitante->tipo_visitante}}</td>
              <td>{{ $item->asunto}}</td>
              @can('visita.edit','visita.destroy')

              @endcan
              <td width="140px">
                <a href="{{$item->info_pdf}}" class="btn btn-outline-dark btn-sm" target="_blank"><i class="fas fa-lg fa-file"></i></a>
                <a href="{{route('visita.edit', $item)}}" class="btn btn-outline-success btn-sm"><i class="fas fa-lg fa-edit"></i></a>
                <form action="{{route('visita.destroy', $item)}}" method="post" style="display: inline;" class="eliminar"> @csrf @method('delete') <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fas fa-lg fa-trash"></i></button></form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
  </div>
</div>
@stop

@section('js')

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

  $('#visita').DataTable({
    order: [[0, 'desc']],
    responsive: true,
    autoWidth: false,
    "language": {
          "lengthMenu": "Mostrar "+`
          <select class="custom-select custom-select-sm form-control form-control-sm">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
            <option value="-1">All</option>
          </select>
          `+" registros por paginas",
          "zeroRecords": "Nada encontrado - lo siento",
          "info": "Mostrando la pagina _PAGE_ de _PAGES_",
          "infoEmpty": "No records available",
          "infoFiltered": "(filtrado de _MAX_ registro total)",
          "search":"Buscar: ",
          "paginate":{
            "next": "Siguiente",
            "previous": "Anterior"
          }
      }
  });
</script>
@stop
