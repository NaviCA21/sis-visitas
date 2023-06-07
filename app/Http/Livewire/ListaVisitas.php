<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Visita;
use App\Models\Visitante;
use App\Models\Periodo;

class ListaVisitas extends Component
{
    //definimos unas variables frontend
    public $id_visita, $id_visitante, $id_periodo, $nombre, $a_paterno, $a_materno,
    $dni, $institucion, $telefono, $num_visitantes, $asunto,
    $fecha, $hora_inicio;

    public $modal = false;

    public $fecha_live_wire;
    public $horarios_libres;

    public function render()
    {
        $visita = Visita::all();
        // dd($visita);

        $lista_horas_ocupadas = Periodo::where('fecha', '=', $this->fecha_live_wire)->get();

        $horarios_totales_mananitas = array('09:00:00', '10:00:00', '11:00:00');
        $horarios_totales_tardecitas = array('14:00:00', '15:00:00');

        $dayOfWeek = date("l", strtotime( $this->fecha_live_wire));

        $horarios_ocupados = array();

        foreach ($lista_horas_ocupadas as $item) {
            array_push($horarios_ocupados, $item->hora_inicio);
        }

        if($dayOfWeek == 'Monday' || $dayOfWeek == 'Friday' ){

            $this->horarios_libres = array_diff($horarios_totales_mananitas, $horarios_ocupados);
        }
        else if($dayOfWeek == 'Wednesday'){

            $this->horarios_libres = array_diff($horarios_totales_tardecitas, $horarios_ocupados);
        }else {

            $this->horarios_libres = array('00:00:00');
        }

        return view('livewire.lista-visitas', compact('visita'));
    }

    public function abrirModal()
    {
        $this->modal = true;
    }

    public function cerrarModal()
    {
        $this->modal = false;
    }

    public function editar($id)
    {
        dd('hola');
        $visita = Visita::findOrFail($id);
        $this->id_visita = $id;
        $this->asunto = $visita->asunto;

        $this->id_visitante = $visita->visitante_id;
        $this->id_periodo = $visita->periodo_id;
        //relacion con tablas
        $visitante = Visitante::findOrFail($visita->visitante_id);
        $periodo = Periodo::findOrFail($visita->periodo_id);

        // visitante
        $this->nombre = $visitante->nombre;
        $this->a_paterno = $visitante->a_paterno;
        $this->a_materno = $visitante->a_materno;
        $this->dni = $visitante->dni;
        $this->institucion = $visitante->institucion;
        $this->telefono = $visitante->telefono;
        $this->num_visitantes = $visitante->num_visitantes;

        // periodo
        $this->fecha = $periodo->fecha;
        $this->hora_inicio = $periodo->hora_inicio;

        $this->abrirModal();

    }

    public function actualizar()
    {

        Visita::updateOrCreate(['id'=>$this->id_visita],
        [
            'asunto' => $this->asunto
        ]);

        Visitante::updateOrCreate(['id'=>$this->id_visitante],
        [
            'nombre' => $this->nombre,
            'a_paterno' => $this->a_paterno,
            'a_materno' => $this->a_materno,
            'dni' => $this->dni,
            'institucion' => $this->institucion,
            'telefono' => $this->telefono,
            'num_visitantes' => $this->num_visitantes
        ]);

        Periodo::updateOrCreate(['id'=>$this->id_periodo],
        [
            'fecha' => $this->fecha_live_wire,
            'hora_inicio' => $this->hora_inicio,
            'hora_fin' => $this->hora_inicio
        ]);

        session()->flash('message',
        $this->id_visita ? '¡Actualización exitosa!' : '¡Alta Exitosa!');

        $this->cerrarModal();
        // $this->limpiarCampos();

    }

}
