<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdenDia extends Model
{
    protected $table = 'orden_dias';

    protected $fillable = [
       'fecha', 'ruta', 'estado'
    ];

}
