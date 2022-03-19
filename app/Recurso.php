<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    protected $table = 'recursos';

    protected $fillable = [
        'nombre','link','ruta','carpeta_recurso_id','estado'
    ];

    public function carpeta()
    {
        return $this->belongsTo('App\CarpetasRecursos','carpeta_recurso_id');
    }
}
