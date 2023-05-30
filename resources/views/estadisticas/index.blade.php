<<<<<<< HEAD
x
=======
@extends('adminlte::page')

@section('content')
    <div class="content-header">
        <!-- Resto del contenido de la vista... -->
    </div>

    <div id="container"></div>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        // Datos de muestra
        var datosEstadisticos = [
            { mes: 'Enero', visitas_natural: 100, visitas_juridica: 50 },
            { mes: 'Febrero', visitas_natural: 150, visitas_juridica: 75 },
            { mes: 'Marzo', visitas_natural: 200, visitas_juridica: 100 },
            // Agrega más datos de muestra para otros meses...
        ];

        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Tabla de datos estadísticos'
            },
            xAxis: {
                categories: datosEstadisticos.map(dato => dato.mes),
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'N° de visitas'
                }
            },
            series: [{
                name: 'Persona Natural',
                data: datosEstadisticos.map(dato => dato.visitas_natural)
            }, {
                name: 'Persona Jurídica',
                data: datosEstadisticos.map(dato => dato.visitas_juridica)
            }]
        });
    </script>
@stop
>>>>>>> 943988e4cc8e698e72cc94f552e48aae50dcd129
