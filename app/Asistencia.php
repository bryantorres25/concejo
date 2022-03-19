<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;


class Asistencia extends Model
{
    protected $table = 'asistencias';

    protected $fillable = [
        'fecha', 'persona_id','estado','hora'
    ];

    public function setNombreAttribute($value)
    {
        $this->attributes['nombres'] = ucwords($value);
    }

    public function setApellidoAttribute($value)
    {
        $this->attributes['apellidos'] = ucwords($value);
    }


    public function persona()
    {
        return $this->belongsTo('App\Persona');

    }

    public static function consulta($date){
        $asistencias=DB::table('asistencias as a')
        ->join('personas as p','a.persona_id','=','p.id')
        ->join('partidos as par','p.partido_id','=','par.id')
        ->select('a.fecha','a.hora','p.nombres','p.apellidos','par.nombre','par.logo','p.cargo_id')
        ->where('a.fecha',$date)
        ->where('p.cargo_id','!=',1)
        ->where('p.cargo_id','!=',2)
        ->orderBy('a.id','asc')
        ->get();
        return $asistencias;
    }
}
