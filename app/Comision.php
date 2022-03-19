<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comision extends Model
{
    protected $table = 'comisiones';

    protected $fillable = [
       'nombre', 'tipo','estado'
    ];

    public static function consulta($tipo,$comision_id){
        $comisiones=DB::table('personas as p')
        ->join('comisiones as c','p.comision_id','=','c.id')
        ->join('cargos as car','p.cargo_id','=','car.id')
        ->join('partidos as par','p.partido_id','=','par.id')
        ->select('p.nombres','p.apellidos','p.foto','car.nombre as cargo','par.logo','c.nombre','c.tipo')
        ->where('c.tipo',$tipo)
        ->where('c.id',$comision_id)
        ->paginate(10);
        return $comisiones;
    }
}
