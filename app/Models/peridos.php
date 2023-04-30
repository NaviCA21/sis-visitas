<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peridos extends Model
{
    use HasFactory;
    //relacion de uno a muchos 
    public function periodos(){
        return $this->hasMany(periodos::class);
        
    }
}
