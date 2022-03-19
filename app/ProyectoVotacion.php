<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProyectoVotacion extends Model
{
    protected $table = 'proyecto_votaciones';

    protected $fillable = [
       'proyecto_id', 'persona_id', 'fecha', 'estado_id', 'observaciones', 'estado'
    ];


    public function usuario()
    {
        return $this->belongsTo('App\User');
    }

    public function proyecto()
    {
        return $this->belongsTo('App\Proyecto');
    }

}
