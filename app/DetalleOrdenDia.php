<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleOrdenDia extends Model
{
    protected $table = 'detalle_orden_dia';

    protected $fillable = [
       'orde_dia_id', 'posicion', 'descripcion'
    ];
}
