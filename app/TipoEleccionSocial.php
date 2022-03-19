<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEleccionSocial extends Model
{
    protected $table = 'tipoeleccionessociales';

    protected $fillable = [
       'fecha','nombre', 'estado','estado_vista','tipovotacion_id'
    ];
}
