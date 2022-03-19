<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $table = 'proyectos';

    protected $fillable = [
        'nombre', 'descripcion','documento','anexos','ruta', 'persona_id','proponente_id','estado',
        'estado_vista','comision_id','ponente','coponente','coordinador','ponencia_uno','ponencia_dos'
    ];

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = ucwords($value);
    }

    public function persona()
    {
        return $this->belongsTo('App\Persona');
    }

    public function proponente()
    {
        return $this->belongsTo('App\Proponente');
    }

    public function comision()
    {
        return $this->belongsTo('App\Comision');
    }


}
