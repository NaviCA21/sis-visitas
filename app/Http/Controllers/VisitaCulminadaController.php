<?php

namespace App\Http\Controllers;
use App\Models\Visita;

use App\Models\VisitaCulminada;
use Illuminate\Http\Request;

class VisitaCulminadaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $visitas = Visita::all(); // Obtén todos los registros de la tabla "visitas"
        return view('visita.culminada.index', compact('visitas')); // Pasa los datos a la vista
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
    public function show(VisitaCulminada $visitaCulminada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VisitaCulminada $visitaCulminada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VisitaCulminada $visitaCulminada)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VisitaCulminada $visitaCulminada)
    {
        //
    }
}
