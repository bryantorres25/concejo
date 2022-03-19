<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResultadoVotacionUnica extends Model
{
    protected $table = 'resultado_votaciones_unicas';

    protected $fillable = [
       'fecha', 'aspirante_id', 'tipoeleccion_id', 'votos'
    ];


    public function aspirante()
    {
        return $this->belongsTo('App\Aspirante');
    }

    public function tipoeleccion()
    {
        return $this->belongsTo('App\TipoEleccion');
    }

}
