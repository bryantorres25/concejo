<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EleccionComision extends Model
{
    protected $table = 'elecciones_comisiones';

    protected $fillable = [
       'fecha', 'plancha_id','persona_id'
    ];


}
