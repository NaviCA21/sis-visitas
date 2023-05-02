@extends('adminlte::page')

@section('content')
<div class="titulo">
    <br>
    <h1 class="text-center font-weight-bold">BIENVENIDO AL SISTEMA DE REGISTRO DE VISITAS</h1>
    <br>
    <br>
    <div class="mt-4 text-center">
      <a href="#" class="btn btn-primary btn-lg mr-4"><i class="fas fa-book"></i> Manual de Usuario</a>
      <a href="#" class="btn btn-secondary btn-lg"><i class="fas fa-book"></i> Manual de Administrador</a>
      <br>
    </div>
  </div>
  <div id='calendario'></div>

  <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Tus visitas de hoy {{date('d-m-y')}}</h3>
              </div>
              <div class="card-body">
                  <div class="row">
                      <div class="col-md-12">
                          <div class="info-box bg-gradient-primary">
                              <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>
                              <table class="table">

                                <tbody>
                                    @foreach ( $notificaciones as $noti )
                                    <tr>
                                        <td><h2>Visita {{$num++}}</h2></td>
                                        <td><h2>a la hora {{$noti->hora_inicio}}</h2></td>
                                        <td><h2>con {{$noti->nombre}} {{$noti->a_paterno}} {{$noti->a_materno}}</h2></td>
                                    </tr>

                                    @endforeach
                                </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection

@push('css')
<style>
  .titulo {
    margin-bottom: 50px;
  }

  .btn {
    border-radius: 50px;
  }

  .btn i {
    margin-right: 10px;
  }

  .fc-event-hoy {
    background-color: #dc3545 !important;
    border-color: #dc3545 !important;
    animation: blink 2s ease-in-out infinite alternate;
  }

  @keyframes blink {
    from {
      opacity: 1;
    }
    to {
      opacity: 0.2;
    }
  }
</style>
@endpush
