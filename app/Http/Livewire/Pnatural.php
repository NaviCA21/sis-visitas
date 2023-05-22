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
  

    public function render()
    {

        // echo('fecha_live_wire: '.$this->fecha_live_wire);
        $lista_horas_ocupadas = Periodo::where('fecha', '=', $this->fecha_live_wire)->get();


        $horarios_totales_mananitas = array('09:00:00', '10:00:00', '11:00:00');
        $horarios_totales_tardecitas = array('14:00:00', '15:00:00');

        $dayOfWeek = date("l", strtotime( $this->fecha_live_wire));

        $horarios_ocupados = array();


        foreach ($lista_horas_ocupadas as $item) { 
            array_push($horarios_ocupados, $item->hora_inicio);
        }
 
        if($dayOfWeek == 'Monday' || $dayOfWeek == 'Friday' ){
            
            $horarios_libres = array_diff($horarios_totales_mananitas, $horarios_ocupados);
        }
        else if($dayOfWeek == 'Wednesday'){

            $horarios_libres = array_diff($horarios_totales_tardecitas, $horarios_ocupados);
        }else {
            $horarios_libres = array('00:00:00');
        }
        return view('livewire.pnatural', compact('lista_horas_ocupadas', 'horarios_libres'));


    }
}
