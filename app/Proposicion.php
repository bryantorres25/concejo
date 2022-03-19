<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposicion extends Model
{
    protected $table = 'proposiciones';

    protected $fillable = [
        'nombre','bancada','ruta' ,'estado','persona_id','descripcion'
    ];


}
