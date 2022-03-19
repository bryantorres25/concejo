<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Derrotero extends Model
{
    protected $table = 'derrotero';

    protected $fillable = [
        'fecha','ruta','estado'
    ];

    
}
