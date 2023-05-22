<?php

namespace App\Http\Controllers;

use App\Models\Estadisticas;
use App\Models\Visita;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EstadisticasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datosEstadisticos = Visita::select(DB::raw("DAYNAME(periodos.fecha) as dia_semana, COUNT(*) as total_visitas"))
    ->join('periodos', 'visitas.periodo_id', '=', 'periodos.id')
    ->whereIn(DB::raw("DAYOFWEEK(periodos.fecha)"), [2, 3, 4, 5, 6]) // Filtrar solo los días de la semana (lunes a viernes)
    ->groupBy('dia_semana')
    ->orderBy(DB::raw("DAYOFWEEK(periodos.fecha)"))
    ->get();



        // Pasar los datos a la vista
        return view('estadisticas.index', compact('datosEstadisticos'));
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
