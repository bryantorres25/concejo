<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarpetasRecursos extends Model
{
    protected $table = 'carpetas_recursos';

    protected $fillable = [
       'nombre', 'estado'
    ];

    
}
