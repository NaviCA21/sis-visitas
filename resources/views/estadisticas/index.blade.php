@extends('adminlte::page')

@section('content')
    <div class="card">
        <div class="card-body">
            <h1>Resultados del Reporte</h1>

            <form id="filterForm" action="{{ route('estadisticas.index') }}" method="GET">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="filtro_anio">Seleccione un año</label>
                            <select class="form-control" name="filtro_anio" onchange="submitForm()">
                                <option value="">Todos los años</option>
                                @foreach($years as $year)
                                    <option value="{{ $year }}" {{ $year == $selectedYear ? 'selected' : '' }}>{{ $year }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="filtro_mes">Seleccione un mes</label>
                            <select class="form-control" id="filtro_mes" name="filtro_mes" onchange="submitForm()">
                                <option value="">Todos los meses</option>
                                @foreach($months as $month)
                                <option value="{{ $month }}">{{ \Carbon\Carbon::parse($selectedYear . '-' . $month . '-01')->locale('es')->monthName }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </form>

            <div id="chart_div"></div>
        </div>
    </div>

    <script>
        function submitForm() {
            document.getElementById("filterForm").submit();
        }

        document.addEventListener("DOMContentLoaded", function() {
            loadChart();
        });

        function loadChart() {
            var selectedMonth = document.getElementById("filtro_mes").value;

            if (selectedMonth) {
                var url = "{{ route('estadisticas.chartData') }}?filtro_anio={{ $selectedYear }}&filtro_mes=" + selectedMonth;

                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        // Renderizar el gráfico con los datos obtenidos
                        // Puedes utilizar cualquier biblioteca de gráficos como Chart.js o Google Charts aquí
                        // Ejemplo:
                        var chartData = data.chartData;
                        // ...
                    })
                    .catch(error => {
                        console.error("Error al cargar los datos del gráfico:", error);
                    });
            }
        }
    </script>
@endsection




@section('js')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Fecha');
            data.addColumn('number', 'Visitas');

            var chartData = @json($chartData);

            data.addRows(chartData);

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
@endsection
