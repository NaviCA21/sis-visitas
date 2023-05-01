<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Visitante extends Model
{
    use HasFactory;

    public function visitante(){
        return $this->hasMany(Visitante::class);

    }

    //relacion uno a muchos
    public function visitas(){
        return $this->hasMany(Visita::class);
    }

    //relacion de muchos a uno
    public function tipoVisitante(){
        return $this->belongsTo(TipoVisitante::class);
    }
}
