<?php

namespace App\Http\Controllers;

use App\Models\Estadisticas;
use App\Models\Visita;
use App\Models\Periodo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EstadisticasController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {

        // Obtener los años disponibles desde la base de datos
        $years = Periodo::select(DB::raw('YEAR(fecha) AS year'))
            ->distinct()
            ->pluck('year');

            $selectedYear = $request->input('filtro_anio');
            $months = Periodo::whereYear('fecha', $selectedYear)
                ->select(DB::raw('MONTH(fecha) AS month_number'))
                ->distinct()
                ->orderBy('month_number')
                ->pluck('month_number');


        // Obtener las visitas filtradas por año y mes seleccionados
        $selectedMonth = $request->input('filtro_mes');
        $visitas = Periodo::whereYear('fecha', $request->input('filtro_anio'))
            ->whereMonth('fecha', $selectedMonth)
            ->join('visitas', 'periodos.id', '=', 'visitas.periodo_id')
            ->get();


        // Obtener los datos estadísticos para el gráfico
        $chartData = [];
        foreach ($visitas as $visita) {
            $date = Carbon::parse($visita->fecha)->format('Y-m-d');
            $chartData[] = [$date, $visita->visitante->tipo_visitante];
        }

        return view('estadisticas.index', compact('years', 'months', 'chartData', 'selectedYear'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Estadisticas $estadisticas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estadisticas $estadisticas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estadisticas $estadisticas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estadisticas $estadisticas)
    {
        //
    }
}
