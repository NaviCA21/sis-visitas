<?php

namespace App\Http\Controllers;

use App\Models\Visita;
use App\Models\Periodo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        // Obtener el año seleccionado (por defecto, el primer año de la lista)
        $selectedYear = $request->input('filtro_anio', $years->first());

        // Obtener los meses disponibles para el año seleccionado
        $months = Periodo::whereYear('fecha', $selectedYear)
            ->select(DB::raw('MONTH(fecha) AS month_number'))
            ->distinct()
            ->orderBy('month_number')
            ->pluck('month_number');

        // Obtener el mes seleccionado (por defecto, el primer mes de la lista)
        $selectedMonth = $request->input('filtro_mes', $months->first());

        // Obtener las visitas filtradas por año y mes seleccionados
        $visitas = Visita::whereHas('periodo', function ($query) use ($selectedYear, $selectedMonth) {
            $query->whereYear('fecha', $selectedYear)
                ->whereMonth('fecha', $selectedMonth);
        })->get();

        // Contadores para personas naturales y personas jurídicas
        $contadorPersonasNaturales = 0;
        $contadorPersonasJuridicas = 0;

        foreach ($visitas as $visita) {
            if ($visita->visitante->tipo_visitante === 'Persona Natural') {
                $contadorPersonasNaturales++;
            } elseif ($visita->visitante->tipo_visitante === 'Persona Jurídica') {
                $contadorPersonasJuridicas++;
            }
        }

        // Preparar los datos para el gráfico
        $chartData = [
            ['Tipo de visitante', 'Visitas'],
            ['Personas Naturales', $contadorPersonasNaturales],
            ['Personas Jurídicas', $contadorPersonasJuridicas],
        ];

        return view('estadisticas.index', compact('years', 'months', 'selectedYear', 'selectedMonth', 'chartData'));
    }

    /**
     * Retrieve chart data as JSON.
     */
    public function chartData(Request $request)
    {
        $selectedYear = $request->input('filtro_anio');
        $selectedMonth = $request->input('filtro_mes');

        // Obtener las visitas filtradas por año y mes seleccionados
        $visitas = Visita::whereHas('periodo', function ($query) use ($selectedYear, $selectedMonth) {
            $query->whereYear('fecha', $selectedYear)
                ->whereMonth('fecha', $selectedMonth);
        })->get();

        // Contadores para personas naturales y personas jurídicas
        $contadorPersonasNaturales = 0;
        $contadorPersonasJuridicas = 0;

        foreach ($visitas as $visita) {
            if ($visita->visitante->tipo_visitante === 'Persona Natural') {
                $contadorPersonasNaturales++;
            } elseif ($visita->visitante->tipo_visitante === 'Persona Jurídica') {
                $contadorPersonasJuridicas++;
            }
        }

        // Preparar los datos para el gráfico
        $chartData = [
            ['Tipo de visitante', 'Visitas'],
            ['Personas Naturales', $contadorPersonasNaturales],
            ['Personas Jurídicas', $contadorPersonasJuridicas],
        ];

        // Retornar los datos como respuesta JSON
        dd($chartData);
        // return response()->json(['chartData' => $chartData]);
    }
}
