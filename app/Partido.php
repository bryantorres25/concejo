<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Partido extends Model
{
    protected $table = 'partidos';

    protected $fillable = [
       'nombre', 'logo', 'estado'
    ];

    public static function consulta($id){
        $partidos=DB::table('personas as p')
        ->join('partidos as par','p.partido_id','=','par.id')
        ->select('p.nombres','p.apellidos','p.foto','par.nombre as partido','par.logo')
        ->where('par.id',$id)
        ->paginate(10);
        return $partidos;
    }
}

