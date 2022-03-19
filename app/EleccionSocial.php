<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EleccionSocial extends Model
{
    protected $table = 'elecciones_social';

    protected $fillable = [
       'fecha', 'aspirantegrupal_id','persona_id','eleccionsocial_id','estado'
    ];
}
