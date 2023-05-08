@extends('adminlte::page')

@section('content')
<br><br>
<div class="row">
    <div class="col-md-6">
      <a href="{{ route('pnatural.create') }}" class="btn btn-primary btn-lg btn-block">
        <i class="fa fa-user fa-5x"></i><br>
        Persona Natural
      </a>
    </div>
    <div class="col-md-6">
      <a href="{{ route('pjuridica.create') }}" class="btn btn-success btn-lg btn-block">
        <i class="fa fa-building fa-5x"></i><br>
        Persona Jurídica
      </a>
    </div>
  </div>

@endsection
