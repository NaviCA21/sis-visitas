<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    use HasFactory;
    //relacion uno a muchos
    public function users(){
        return $this->hasMany(User::class);
    }
}
