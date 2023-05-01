<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoVisitante extends Model
{
    use HasFactory;

    //relacion uno a muchos

    public function tipoVisitantes(){
        return $this->hasMany(TipoVisitante::class);

    }

    public function visitantes(){
        return $this->hasMany(Visitante::class);
    }
}
