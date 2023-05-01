<?php

namespace App\Http\Controllers;

use App\Models\Periodo;
use App\Models\TipoVisitante;
use App\Models\Visita;
use App\Models\Visitante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class VisitaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        $visita = Visita::all();

        // dd($visita);

        return view('visita.index', compact('visita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * return \Illuminate\Http\Response
     */


    public function create()
    {
        return view('visita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
            // perido
            'nombre' => 'required',
            'a_paterno' => 'required',
            'a_materno' => 'required',
            'dni' => 'required',
            'institucion' => 'required',
            'telefono' => 'required',
            'num_visitantes' => 'required',
            'tipo' => 'required',
            'asunto' => 'required',
        ]);

        $periodos = new Periodo();
        $periodos->fecha = $request->fecha;
        $periodos->hora_inicio = $request->hora_inicio;
        $periodos->hora_fin = $request->hora_fin;

        $periodos->save();

        $tipo_visitante = new TipoVisitante();
        $tipo_visitante->tipo_visitante = $request->tipo;

        $tipo_visitante->save();

        // $visitante->nombre de la bd = $request->name del formulario
        $visitantes = new visitante();
        $visitantes->nombre = $request->nombre;
        $visitantes->a_paterno = $request->a_paterno;
        $visitantes->a_materno = $request->a_materno;
        $visitantes->dni = $request->dni;
        $visitantes->institucion = $request->institucion;
        $visitantes->telefono = $request->telefono;
        $visitantes->num_visitantes = $request->num_visitantes;
        $visitantes->tipo_visitante_id = $tipo_visitante->id;

        $visitantes->save();



        $visita = new Visita();
        if($request->asunto !=NULL)
        $visita->asunto = $request->asunto;
        $visita->visitante_id = $visitantes->id;
        $visita->periodo_id = $periodos->id;
        $visita->save();


        return Redirect::route('visitas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Visita $visita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visita $visita)
    {
        //
        $visitante = Visitante::all();
        $periodo = $visita->periodo;
        return view('visita.edit', compact('visita', 'visitante', 'periodo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visita $visita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visita $visita)
    {
        $visita->delete();

        return back()->with('eliminar', 'delete');
    }
}
