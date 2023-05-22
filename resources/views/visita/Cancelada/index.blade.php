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
                        Bienvenido al sistema informático de gestión académica
                    </h1>
                    <h2 class="m-0 text-center">
                        "Relación de visitas canceladas"
                    </h2>
                </div>
                <div class="col-sm-6">
                    {{-- <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v1</li>
                </ol> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="visita">
                    <thead class="thead-dark">
                        <tr>
                            <th>Fecha</th>
                            <th>Visitante</th>
                            <th>DNI</th>
                            <th>Institución</th>
                            <th>Teléfono</th>
                            <th>Horario</th>
                            <th>N° Visitantes</th>
                            <th>Tipo Visitante</th>
                            <th>Asunto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($visitasCanceladas as $visitaCancelada)
                            <tr>
                                <td>{{ optional($visitaCancelada->periodo)->fecha }}</td>
                                <td>{{ optional($visitaCancelada->visitante)->nombre }}
                                    {{ optional($visitaCancelada->visitante)->a_paterno }}
                                    {{ optional($visitaCancelada->visitante)->a_materno }}</td>
                                <td>{{ optional($visitaCancelada->visitante)->dni }}</td>
                                <td>{{ optional($visitaCancelada->visitante)->institucion }}</td>
                                <td>{{ optional($visitaCancelada->visitante)->telefono }}</td>
                                <td>{{ optional($visitaCancelada->periodo)->hora_inicio }}
                                    {{ optional($visitaCancelada->periodo)->hora_fin }}</td>
                                <td>{{ optional($visitaCancelada->visitante)->num_visitantes}}</td>
                                <td>{{ optional($visitaCancelada->visitante->tipoVisitante)->tipo_visitante }}</td>
                                <td>{{ optional($visitaCancelada)->asunto }}</td>
                                <td>
                                    {{-- Restaurar visita cancelada --}}
                                    <form action="{{ route('visita.cancelada.restaurar', $visitaCancelada->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success">Restaurar</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop
``
