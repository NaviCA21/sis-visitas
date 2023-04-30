<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Visitantes extends Model
{
    use HasFactory;
    //relacion uno a muchos
    public function visitas(){
        return $this->hasMany(Visita::class);
    }
         //relacion de muchos a uno

    //relacion de muchos a uno
    public function tipoVistante(){
        return $this->belongsTo(tipoVistante::class);
    }
}