@extends('adminlte::page')

@section('content')
    <div class="content-header">
        <!-- Resto del contenido de la vista... -->
    </div>

    <div id="container"></div>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Tabla de datos estadísticos'
            },
            xAxis: {
                categories: [
                    @foreach($datosEstadisticos as $dato)
                        '{{ $dato->dia_semana }}',
                    @endforeach
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'N° de visitas'
                }
            },
            series: [{
                name: 'Visitas',
                data: [
                    @foreach($datosEstadisticos as $dato)
                        {{ $dato->total_visitas }},
                    @endforeach
                ]
            }]
        });
    </script>
@stop
