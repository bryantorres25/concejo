<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VotacionSecreta extends Model
{
    protected $table = 'votaciones_Secretas';

    protected $fillable = [
       'proyecto_secreto_id', 'respuesta', 'ip', 'hora', 'fecha', 'estado_id', 'observaciones', 'estado'
    ];


    public function usuario()
    {
        return $this->belongsTo('App\User');
    }

  


    public function proyecto()
    {
        return $this->belongsTo('App\Proyecto');
    }

}
