<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoVotacion extends Model
{
    protected $table = 'tipovotaciones';

    protected $fillable = [
       'nombre', 'descripcion', 'estado'
    ];
}
