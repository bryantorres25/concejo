<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plancha extends Model
{
    protected $table = 'plancha';

    protected $fillable = [
       'nombre', 'postulante_id', 'estado','fecha'
    ];

    public function persona()
    {
        return $this->belongsTo('App\Persona');
    }

}
