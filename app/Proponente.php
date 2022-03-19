<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proponente extends Model
{
    protected $table = 'proponentes';

    protected $fillable = [
        'nombres', 'apellidos','documento','correo','cargo','estado', 'tipo'
    ];

    public function setNombreAttribute($value)
    {
        $this->attributes['nombres'] = ucwords($value);
    }
}
