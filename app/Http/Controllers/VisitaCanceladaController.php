<?php

namespace App\Http\Controllers;

use App\Models\VisitaCancelada;
use App\Models\Periodo;
use App\Models\TipoVisitante;
use App\Models\Visitante;
use App\Models\Visita;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;

class VisitaCanceladaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visitasCanceladas = Visita::onlyTrashed()->with('visitante.tipoVisitante', 'periodo')->get();
        // dd($visitasCanceladas);
        return view('visita.cancelada.index', compact('visitasCanceladas'));
    }

    // Restaurar una visita cancelada
    public function restore($id)
    {
        $visitaCancelada = Visita::onlyTrashed()->find($id);
        $visitaCancelada->restore();
        return redirect()->route('visita.cancelada.index')->with('success', 'Visita cancelada restaurada exitosamente');
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
    public function show(VisitaCancelada $visitaCancelada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VisitaCancelada $visitaCancelada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VisitaCancelada $visitaCancelada)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VisitaCancelada $visitaCancelada)
    {
        //
    }
}
