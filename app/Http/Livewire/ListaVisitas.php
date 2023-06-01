<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Visita;

class ListaVisitas extends Component
{   
    //definimos unas variables
    public $nombre, $a_paterno, $a_materno, $id_producto,
    $dni, $inputEmail4, $telefono, $num_visitantes, $asunto,
    $fecha, $hora_inicio;
    public $modal = false;

    public function render()
    {
        $visita = Visita::all();
        // dd($visita);
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
        // dd('visita que esperas para aprender wire clicking');
        $visita = Visita::findOrFail($id);
        $this->asunto = $visita->asunto;

        $this->abrirModal();
    }

    public function vaLLorar() {
        dump('vallorar');
    }

}

