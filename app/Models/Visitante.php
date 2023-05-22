<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visitante extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    use HasFactory;

    // Relación uno a muchos con Visitas
    public function visitas()
    {
        return $this->hasMany(Visita::class);
    }

    // Relación muchos a uno con TipoVisitante
    public function tipoVisitante()
    {
        return $this->belongsTo(TipoVisitante::class);
    }
}
