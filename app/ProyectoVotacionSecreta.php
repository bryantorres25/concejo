<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProyectoVotacionSecreta extends Model
{
    protected $table = 'proyecto_votaciones_secreta';

    protected $fillable = [
       'proyecto_id', 'persona_id', 'fecha', 'estado_id', 'observaciones', 'estado'
    ];


    public function persona()
    {
        return $this->belongsTo('App\Persona');
    }

    public function proyecto()
    {
        return $this->belongsTo('App\ProyectoSecreta');
    }

}
