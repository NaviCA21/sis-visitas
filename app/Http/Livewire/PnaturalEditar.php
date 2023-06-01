<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Periodo;
use App\Models\Visita;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PnaturalEditar extends Component
{

    public $fecha_live_wire = '2023-05-24';
    public $visitas_datos;

    public function render()
    {
        
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
        }else if($dayOfWeek == 'Thursday'){
            $horarios_libres = array_diff($horarios_totales_tardecitas, $horarios_ocupados);
        }else {
            $horarios_libres = array('00:00:00');
        } 
 
        $this->visitas_datos  = DB::table('visitas')
        ->join('visitantes', 'visitantes.id', '=', 'visitas.visitante_id') 
        ->join('periodos', 'periodos.id', '=', 'visitas.periodo_id') 
            ->select( 
                'visitas.*', 
                'visitantes.*',
                'periodos.*'
                )
                ->get();
                
        return view('livewire.pnatural-editar', compact('horario', 'horarios_libres'));
    }

    public function editar($id){         
        Visita::destroy($id);     
    }
}
