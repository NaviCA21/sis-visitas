<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Periodo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Pjuridica extends Component
{
    public $search = '';

    public $fecha_live_wire = '2023-05-24';

    public function render()
    {
        $lista_horas_ocupadas = Periodo::where('fecha', '=', $this->fecha_live_wire)->get();

        $horarios_totales = array('09:00:00', '10:00:00', '11:00:00');

        $horarios_ocupados = array();

        foreach ($lista_horas_ocupadas as $item) {
            
            array_push($horarios_ocupados, $item->hora_inicio);
            
        }
        
        $horarios_libres = array_diff($horarios_totales, $horarios_ocupados);

        return view('livewire.pjuridica', compact('lista_horas_ocupadas', 'horarios_libres'));
    }
}
