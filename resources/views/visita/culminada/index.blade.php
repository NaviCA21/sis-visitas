@extends('adminlte::page')

@section('sistemas')
    <h1>sistemas</h1>
@stop

@section('content')



    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    {{-- <h1 class="m-0">Bienvenido</h1> --}}
                    <h1 class="m-0 text-center">
                        Bienvenido al sistema  informático de gestión académica

                    </h1>
                    <h2 class="m-0 text-center">
                        "Relacion de visitas culminadas"

                    </h2>
                </div>
                <div class="col-sm-6">
                    {{-- <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol> --}}
                </div>
            </div>
        </div>
    </div>

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
                  <th>Horario</th>
                  <th>N° Visitantes</th>
                  <th>Tipo Visitante</th>
                  <th>Asunto</th>
                  <th>Observaciones</th>
                  <th>Acciones</th>
                </tr>
              </thead>
            </table>
          </div>
      </div>
    </div>
    @stop
