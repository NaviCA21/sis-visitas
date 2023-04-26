<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    use HasFactory;
    use HasFactory;
    //relacion uno a muchos
    public function visitas(){
        return $this->hasMany(Visita::class);
    }
}
