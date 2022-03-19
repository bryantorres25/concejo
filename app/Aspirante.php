<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Aspirante extends Model
{
    protected $table = 'aspirantes';

    protected $fillable = [
        'nombres','apellidos','documento','telefono','direccion','hoja_vida','tipoeleccion_id','estado','foto'
    ];

    public function Tipoeleccion()
    {
        return $this->belongsTo('App\TipoEleccion','tipoeleccion_id');
    }

    public static function consulta($id){
        $aspirantes=DB::table('aspirantes as a')
        ->join('tipoelecciones as t','a.tipoeleccion_id','=','t.id')
        ->select('a.nombres','a.apellidos','a.id','a.foto','a.hoja_vida','t.id as tipo')
        ->where('t.id',$id)
        ->paginate(10);
        return $aspirantes;
    }
}
