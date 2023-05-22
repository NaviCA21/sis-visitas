<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitaCancelada extends Model
{
    use HasFactory;

    protected $dates = ['deleted_at'];

    // Tabla asociada al modelo
    protected $table = 'visitas';

    // Relación con el modelo Visita
    public function visita()
    {
        return $this->belongsTo(Visita::class);
    }

    // Relación con el modelo Visitante
    public function visitante()
    {
        return $this->belongsTo(Visitante::class);
    }

    // Relación con el modelo Periodo
    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }

}
