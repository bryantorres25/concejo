<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProyectoSecreta extends Model
{
    protected $table = 'proyectos_secretos';

    protected $fillable = [
        'nombre', 'descripcion','documento','anexos','ruta', 'persona_id','estado','estado_vista'
    ];

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = ucwords($value);
    }

    public function persona()
    {
        return $this->belongsTo('App\Persona');
    }

    


}
