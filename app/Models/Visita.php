<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visita extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'visitas';

    use HasFactory;

    protected $fillable = ['asunto'];

    protected static function boot()
    {
        parent::boot();

        // Evento "deleting" para eliminar registros relacionados
        static::deleting(function ($visita) {
            // No es necesario eliminar el visitante y el periodo aquí, ya que se encargarán de ello las relaciones definidas
        });
    }

    // Relación muchos a uno con Visitante
    public function visitante()
    {
        return $this->belongsTo(Visitante::class)->with('tipoVisitante');
    }

    // Relación muchos a uno con Periodo
    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }
}
