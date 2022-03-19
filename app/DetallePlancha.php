<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetallePlancha extends Model
{
    protected $table = 'detalles_plancha';

    protected $fillable = [
       'plancha_id', 'comision_id', 'persona_id'
    ];

}
