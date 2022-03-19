<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProposicionVotacion extends Model
{
    protected $table = 'proposicion_votaciones';

    protected $fillable = [
       'proposicion_id', 'persona_id', 'fecha', 'estado_id', 'estado'
    ];


    public function persona()
    {
        return $this->belongsTo('App\Persona');
    }

    public function proposicion()
    {
        return $this->belongsTo('App\Proposicion');
    }

}
