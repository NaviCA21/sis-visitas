@extends('adminlte::page')

@section('title', 'Editar ')

@section('content_header')
    <h1 class="text-center font-weight-bold text-uppercase">Editar Visita</h1>
    @livewireStyles

@stop

@section('content')

    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{ session('info') }}</strong>
    </div>
    @endif

    <div class="card">
 
        @livewire('pnatural-editar')

    </div>

@livewireScripts


@stop

@section('js')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>

    <script>
        $(function() {
            $('select').selectpicker();
        });

    </script>
@stop
