<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoVisitante extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    use HasFactory;

    //relacion uno a muchos

    public function tipoVisitantes(){
        return $this->hasMany(TipoVisitante::class);

    }

    public function visitantes(){
        return $this->hasMany(Visitante::class);
    }
}
