<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Eleccion extends Model
{
    protected $table = 'elecciones';

    protected $fillable = [
       'fecha', 'aspirante_id','persona_id','tipoeleccion_id','estado'
    ];

    
}
