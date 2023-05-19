<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Periodo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Pnatural extends Component
{

    public $search = '';

    public $fecha_live_wire = '2023-05-24';

    // public $horarios = array('09:00:00', '10:00:00', '11:00:00');

    public function render()
    {

        // echo('fecha_live_wire: '.$this->fecha_live_wire);
        $lista_horas_ocupadas = Periodo::where('fecha', '=', $this->fecha_live_wire)->get();


        $horarios_totales = array('09:00:00', '10:00:00', '11:00:00');

        $horarios_ocupados = array();

        $i = 0;

        // dd(count($lista_horas_ocupadas));

        foreach ($lista_horas_ocupadas as $item) {
            // $horarios_ocupados[$i++] = $item->horario_inicio;
            // dd($item->horario_inicio);
            array_push($horarios_ocupados, $item->hora_inicio);
            // dd ("como las mairposas");
        }

        // dd($horarios_ocupados);
        // dd($horarios_totales);

        $horarios_libres = array_diff($horarios_totales, $horarios_ocupados);

        // dd($horarios_libres);

        // echo 'horarios_libre '. $horarios_libres[0];
        // echo 'horarios_libre '. $horarios_libres[1];
        // echo 'horarios_libre '. $horarios_libres[2];




        return view('livewire.pnatural', compact('lista_horas_ocupadas', 'horarios_libres'));
    }
}
