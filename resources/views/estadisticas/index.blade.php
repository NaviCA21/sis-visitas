@extends('adminlte::page')

@section('content')
    <div class="card">
        <div class="card-body">
            <h1>Resultados del Reporte</h1>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">

                        <select class="form-control" id="filtro_anio" name="filtro_anio">
                            <option value="">Seleccione un año</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <!-- Agrega más años aquí -->
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <select class="form-control" id="filtro_mes" name="filtro_mes">
                            <option value="">Seleccione un mes</option>
                            <option value="01">Enero</option>
                            <option value="02">Febrero</option>
                            <!-- Agrega más meses aquí -->
                        </select>
                    </div>
                </div>
            </div>

            <div id="chart_div"></div>
        </div>
    </div>
@stop

@section('js')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Fecha');
            data.addColumn('number', 'Persona Jurídica');
            data.addColumn('number', 'Persona Natural');

            // Datos ficticios para el gráfico de barras
            var visitasData = [
                ['2023-05-01', 3, 2],
                ['2023-05-02', 4, 3],
                ['2023-05-03', 6, 5],
                ['2023-05-04', 7, 4],
                // Agrega más datos ficticios aquí
            ];

            // Filtrar datos por año, mes y semana según la selección del usuario
            var filtroAnio = document.getElementById('filtro_anio').value;
            var filtroMes = document.getElementById('filtro_mes').value;
            var visitasFiltradas = [];

            visitasFiltradas = visitasData.filter(function (visita) {
                if (filtroAnio && visita[0].startsWith(filtroAnio)) {
                    if (filtroMes && visita[0].substring(5, 7) !== filtroMes) {
                        return false;
                    }

                    return true;
                }

                return false;
            });

            data.addRows(visitasFiltradas);

            var options = {
                title: 'Cantidad de Visitas',
                chartArea: {width: '60%'},
                hAxis: {
                    title: 'Fecha',
                    minValue: 0
                },
                vAxis: {
                    title: 'Cantidad'
                }
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }

        // Ejecutar la función drawChart al cambiar la opción de filtrado
        document.getElementById('filtro_anio').addEventListener('change', drawChart);
        document.getElementById('filtro_mes').addEventListener('change', drawChart);
    </script>


@stop
