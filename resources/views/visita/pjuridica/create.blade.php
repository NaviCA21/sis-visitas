@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-center font-weight-bold text-uppercase">Registrar Persona Juridica</h1>
    @livewireStyles


@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
 
        @livewire('pjuridica')

    </div>

    @livewireScripts

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop




