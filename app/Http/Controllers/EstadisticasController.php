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

        
        // Pasar los datos a la vista
        return view('estadisticas.index');
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
