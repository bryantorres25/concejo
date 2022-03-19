<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Palabra extends Model
{
    protected $table = 'palabras';

    protected $fillable = [
       'fecha','persona_id','estado'
    ];


}
