<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Visita;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Pnatural extends Component
{

    public $search = '';
    public $vive = 'SI';

    public function render()
    {

        // // dump($visitas);

        // // return view('livewire.pnatural');
        // // $visitas = Visita::all();
        // // $estudiante = Visita::where('', '=', $this->search)
        // //         ->get()->first();

        // $datos['visitass']  = DB::table('visitas')
        // ->join('periodos', 'visitas.periodo_id', '=', 'periodos.id')
        // ->select('periodos.*','visitas.*')
        // ->get();

        // $date = date("Y-m-d");
        // $dia = date('D', strtotime($datos['visitass'][1]->fecha));

        // // dd($datos['visitass'][0]->fecha);

        // // dd($dia);

        // dump($this->vive);


        return view('livewire.pnatural');
    }
}
