<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Votacion extends Model
{
    protected $table = 'votaciones';

    protected $fillable = [
       'proyecto_id', 'persona_id', 'respuesta', 'ip', 'hora', 'fecha', 'estado_id', 'observaciones', 'estado'
    ];


    public function usuario()
    {
        return $this->belongsTo('App\User');
    }

    public function persona()
    {
        return $this->belongsTo('App\Persona', 'persona_id');
    }


    public function proyecto()
    {
        return $this->belongsTo('App\Proyecto');
    }

}
