@extends('adminlte::page')


@section('content_header')
    <h1 class="text-center font-weight-bold text-uppercase">Lista de visitas</h1>
    @livewireStyles
@stop


@section('css')
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap4.min.css">
@stop

@section('content')

  @livewire('lista-visitas')
  
  @livewireScripts
 
@stop

@section('js')
 
@stop
