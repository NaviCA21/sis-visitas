<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Periodo extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    use HasFactory;

    protected $table = 'periodos';

    // Relación uno a muchos con Visitas
    public function visitas()
    {
        return $this->hasMany(Visita::class);
    }
}
