<?php

namespace App\Http\Controllers;

use App\Models\Periodo;
use App\Models\TipoVisitante;
use App\Models\Visita;
use App\Models\VisitaCancelada;
use App\Models\Visitante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

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
     * Display the specified resource.
     */
    public function show(Visita $visita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Visita $visita)
    // {
    //     //
    //     $visitante = TipoVisitante::all();
    //     return view('visita.edit', compact('visita', 'visitante'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Visita $visita, Periodo $periodo, Visitante $visitante, TipoVisitante $tipo_visitante)
    // {
    //     $request->validate([
    //         'fecha' => 'required',
    //         'hora_inicio' => 'required',
    //         'hora_fin' => 'required',
    //         'nombre' => 'required',
    //         'a_paterno' => 'required',
    //         'a_materno' => 'required',
    //         'dni' => 'required',
    //         'institucion' => 'required',
    //         'telefono' => 'required',
    //         'num_visitantes' => 'required',
    //         'tipo' => 'required',
    //         'asunto' => 'required',
    //     ]);


    //     $periodo->fecha = $request->fecha;
    //     $periodo->hora_inicio = $request->hora_inicio;
    //     $periodo->hora_fin = $request->hora_fin;

    //     $periodo->save();

    //     $tipo_visitante->tipo_visitante = $request->tipo;

    //     $tipo_visitante->save();

    //     // $visitante->nombre de la bd = $request->name del formulario
    //     $visitante->nombre = $request->nombre;
    //     $visitante->a_paterno = $request->a_paterno;
    //     $visitante->a_materno = $request->a_materno;
    //     $visitante->dni = $request->dni;
    //     $visitante->institucion = $request->institucion;
    //     $visitante->telefono = $request->telefono;
    //     $visitante->num_visitantes = $request->num_visitantes;
    //     $visitante->tipo_visitante_id = $tipo_visitante->id;

    //     $visitante->save();

    //     if ($request->asunto != NULL)
    //         $visita->asunto = $request->asunto;
    //     $visita->visitante_id = $visitante->id;
    //     $visita->periodo_id = $periodo->id;
    //     $visita->save();

    //     return Redirect::route('visitas.index');
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visita $visita)
    {
        // VisitaCancelada::


        $visita->delete();

        return back()->with('eliminar', 'delete');
    }
}
