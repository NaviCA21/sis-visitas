@extends('adminlte::page')
    
@section('sistemas')
    <h1>sistemas</h1>
@stop

@section('content')     



    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-center">
                        Bienvenido al sistema  informático de gestión académica

                    </h1>
                    
                </div>
                
            </div>
        </div>
    </div>
    <div id="container">
        

    </div>
            


            
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Tabla de datos estadisticos'
    },
    subtitle: {
        text: 'N° de visitas*dias: Personas Juridicas y Naturales'
    },
    xAxis: {
        categories: [
            'Lunes',
            'Martes',
            'Miercoles',
            'Juevez',
            'Viernes',
        
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'N° de visitas'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'P Juridica',
        data: [2, 5, 1, 3, 4]

    }, {
        name: 'P Natural',
        data: [3, 1, 4, 2, 1]

    }]
});
</script>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop