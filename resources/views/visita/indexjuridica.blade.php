@extends('adminlte::page')


@section('content_header')
    <h1 class="text-center font-weight-bold text-uppercase">REGISTRO DE VISITAS DE PERSONA JURIDICA</h1>
    @livewireStyles
@stop


@section('css')
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap4.min.css">
@stop

@section('content')

  @livewire('lista-visitas-juridica')

  @livewireScripts

@stop

@section('js')

@stop
