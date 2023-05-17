@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>REGISTRAR PADRES</h1>
    @livewireStyles


@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">

        {{-- @livewire('apoderado-create') --}}
        @livewire('pnatural')

    </div>

    @livewireScripts

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script>
        $('#myOptions').change(function() {
            var val = $("#myOptions option:selected").text();

            const div = document.getElementById("section");

            let node = document.createElement('li');
            node.innerHTML = '<input type="checkbox"><label>Content typed by the user</label>  <input type="text"><button class="edit">Edit</button><button class="delete">Delete</button>';

            // alert(val);
            if(val == 'Si'){
                // alert('SIIIIIIIIIII');
                document.getElementById('section').appendChild(node);
            }else if(val == 'No'){
                // alert('noooooooooooo');
                // createElement
                const e = document.querySelector("");
                // remove the last list item
                e.parentElement.removeChild(e);
                document.getElementById('section').removeChild(node);
            }

        });
    </script>
@stop

