<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    use HasFactory;
    //relacion de uno a muchos
    public function periodos(){
        return $this->hasMany(Periodo::class);

    }

    //relacion uno a muchos
    public function visita(){
        return $this->hasMany(Visita::class);
    }
}
