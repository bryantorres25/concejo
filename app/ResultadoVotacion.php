<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResultadoVotacion extends Model
{
    protected $table = 'resultado_votaciones';

    protected $fillable = [
       'proyecto_id', 'persona_id', 'fecha', 'estado_id', 'observaciones', 'hora', 'rechazado', 'aprobado'
    ];


    public function persona()
    {
        return $this->belongsTo('App\Persona');
    }

    public function proyecto()
    {
        return $this->belongsTo('App\Proyecto');
    }

}
