<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEleccion extends Model
{
    protected $table = 'tipoelecciones';

    protected $fillable = [
      'fecha', 'nombre', 'estado','estado_vista','tipovotacion_id'
    ];


    public function tipovotacion()
    {
        return $this->belongsTo('App\TipoVotacion');
    }

    public function persona()
    {
        return $this->belongsTo('App\Persona','persona_id');
    }

}
