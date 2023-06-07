<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Visita;
use App\Models\Visitante;
use App\Models\Periodo;

class ListaVisitasJuridica extends Component
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

        if($dayOfWeek == 'Tuesday'){

            $horarios_libres = array_diff($horarios_totales_mananitas, $horarios_ocupados);
        }
        else if($dayOfWeek == 'Thursday'){

            $horarios_libres = array_diff($horarios_totales_tardecitas, $horarios_ocupados);
        }else {
            $horarios_libres = array('00:00:00');
        }

        return view('livewire.lista-visitas-juridica', compact('visita'));
    }
}
