<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
    use HasFactory;

    protected $fillable = ['info_pdf'];

    protected $casts = [
        'info_fecha' => 'datetime',
    ];


    public function visita(){
        return $this->belongsTo(Visita::class);
    }
    //relacion de muchos a uno
    public function visitante(){
        return $this->belongsTo(Visitante::class);
    }
    public function periodo(){
        return $this->belongsTo(Periodo::class);
    }
    public function getRouteKeyName(){

        return 'info_slug';
    }
}
