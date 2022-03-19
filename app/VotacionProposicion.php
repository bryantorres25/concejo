<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VotacionProposicion extends Model
{
    protected $table = 'votaciones_proposiciones';

    protected $fillable = [
       'proposicion_id', 'persona_id', 'respuesta', 'ip', 'hora', 'fecha', 'estado_id', 'observaciones', 'estado'
    ];




    public function persona()
    {
        return $this->belongsTo('App\persona', 'persona_id');
    }


    public function proposicion()
    {
        return $this->belongsTo('App\Proposicion');
    }

}
