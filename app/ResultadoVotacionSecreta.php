<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResultadoVotacionSecreta extends Model
{
    protected $table = 'resultado_votaciones_secreta';

    protected $fillable = [
       'proyecto_id',  'fecha', 'estado_id', 'observaciones', 'hora', 'rechazado', 'aprobado'
    ];


  

    public function proyecto()
    {
        return $this->belongsTo('App\Proyecto');
    }

}
