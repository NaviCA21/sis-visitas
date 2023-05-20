<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periodo;
use App\Models\TipoVisitante;
use App\Models\Visita;
use App\Models\PJuridica;
use App\Models\Visitante;

class PJuridicaController extends Controller
{
    //
    public function create()
    {
        return view('visita.pjuridica.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required',
            'hora_inicio' => 'required',
            // 'hora_fin' => 'required',
            // perido
            'nombre' => 'required',
            'a_paterno' => 'required',
            'a_materno' => 'required',
            'dni' => 'required',
            'institucion' => 'required',
            'telefono' => 'required',
            'num_visitantes' => 'required',
            // 'tipo' => 'required',
            'asunto' => 'required',
        ]);

        $periodos = new Periodo();
        $periodos->fecha = $request->fecha;
        $periodos->hora_inicio = $request->hora_inicio;
        $periodos->hora_fin = $request->hora_fin;

        $periodos->save();

        $tipo_visitante = new TipoVisitante();
        $tipo_visitante = TipoVisitante::where('tipo_visitante', 'Persona juridica')->firstOrFail();

        $tipo_visitante->save();

        // $visitante->nombre de la bd = $request->name del formulario
        $visitantes = new Visitante();
        $visitantes->nombre = $request->nombre;
        $visitantes->a_paterno = $request->a_paterno;
        $visitantes->a_materno = $request->a_materno;
        $visitantes->dni = $request->dni;
        $visitantes->institucion = $request->institucion;
        $visitantes->telefono = $request->telefono;
        $visitantes->num_visitantes = $request->num_visitantes;
        $visitantes->tipo_visitante_id = $tipo_visitante->id;
        // $tipo_visitante = TipoVisitante::where('tipo_visitante', 'Persona juridica')->firstOrFail();
        // $visitantes->tipo_visitante_id = $tipo_visitante->id;


        $visitantes->save();



        $visita = new Visita();
        if ($request->asunto != NULL) {
            if ($request->asunto === 'otros') {
                $visita->asunto = $request->otros_asunto;
            } else {
                $visita->asunto = $request->asunto;
            }
        }
        $visita->visitante_id = $visitantes->id;
        $visita->periodo_id = $periodos->id;
        $visita->save();


        return Redirect()->route('visitas.index');
    }
}
