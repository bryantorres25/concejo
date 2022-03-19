<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AspiranteGrupal extends Model
{
    protected $table = 'aspirantes_grupales';

    protected $fillable = [
        'nombres','apellidos','documento','telefono','direccion','hoja_vida','eleccionsocial_id','estado','foto'
    ];

    public function Tipoeleccion()
    {
        return $this->belongsTo('App\TipoEleccionSocial','eleccionsocial_id');
    }

    public static function consulta($id){
        $aspirantes=DB::table('aspirantes_grupales as a')
        ->join('tipoeleccionessociales as t','a.eleccionsocial_id','=','t.id')
        ->select('a.nombres','a.apellidos','a.id','a.hoja_vida','a.foto','t.id as tipo','t.fecha')
        ->where('t.id',$id)
        ->paginate(10);
        return $aspirantes;
    }
}
