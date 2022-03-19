<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Debates extends Model
{
    protected $table = 'debates';

    protected $fillable = [
        'nombre', 'descripcion','fecha_recibido','fecha_limite','ciudadano_id','estado'
    ];

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = ucwords($value);
    }

    public function ciudadano()
    {
        return $this->belongsTo('App\Ciudadano');
    }


}
