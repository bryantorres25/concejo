<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personas';

    protected $fillable = [
        'nombres', 'apellidos','fecha_nac','documento','genero','telefono', 'direccion','correo','estado', 'cargo_id', 'partido_id','comision_id','foto'
    ];

    public function setNombreAttribute($value)
    {
        $this->attributes['nombres'] = ucwords($value);
    }

    public function cargo()
    {
        return $this->belongsTo('App\Cargos');
    }

    public function partido()
    {
        return $this->belongsTo('App\Partido');
    }

    public function comision()
    {
        return $this->belongsTo('App\Comision');
    }

    public function planchas()
    {
        return $this->hasOne('App\Plancha','postulante_id');
    }
}
