<?php

namespace App\Http\Controllers;

use App\Asistencia;
use App\Eleccion;
use App\EleccionSocial;
use App\ProyectoVotacion;
use App\ResultadoVotacion;
use App\ResultadoVotacionUnica;
use App\TipoEleccion;
use App\TipoEleccionSocial;
use App\Votacion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultadoEleccionUnicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        //$this->middleware('admin');
        $this->middleware('auth');
    }
    public function index()
    {
        $tipoeleccion=TipoEleccion::where('estado', 1)->get();
        return view('resultadoseleccionunica.index', compact('tipoeleccion'));
    }
    public function filtro(Request $request)
    {
        if (request()->ajax()) {

            $validar=$this->validar($request->tipoeleccion_id,$request->fecha);
            $cantidad=count($validar);
            $tipo= TipoEleccion::find($request->tipoeleccion_id);
            $nombre_eleccion=$tipo->nombre;
            $tipovotacion=$tipo->tipovotacion_id;


            if ($tipovotacion==2) {
                $resultados=DB::table('elecciones as e')
                ->join('aspirantes as a','e.aspirante_id','=','a.id')
                ->join('tipoelecciones as t','a.tipoeleccion_id','=','t.id')
                ->select(DB::raw('COUNT(e.aspirante_id) as votos') ,'t.nombre as eleccion','t.id','e.aspirante_id','a.nombres','a.apellidos','a.foto')
                ->groupBy('e.aspirante_id')
                ->where('e.tipoeleccion_id',$request->tipoeleccion_id)
                ->where('e.fecha',$request->fecha)
                ->get();
                return response()->view('ajax.resultadosunicos', compact( 'resultados', 'cantidad','nombre_eleccion','tipovotacion'));
            }else {
                $resultados=DB::table('elecciones as e')
                ->join('aspirantes as a','e.aspirante_id','=','a.id')
                ->join('tipoelecciones as t','a.tipoeleccion_id','=','t.id')
                ->select(DB::raw('COUNT(e.aspirante_id) as votos') ,'t.nombre as eleccion','t.id','e.aspirante_id','a.nombres','a.apellidos','a.foto')
                ->groupBy('e.aspirante_id')
                ->where('e.tipoeleccion_id',$request->tipoeleccion_id)
                ->where('e.fecha',$request->fecha)
                ->get();
                $resultadosn=DB::table('elecciones as v')
                ->join('personas as p','p.id','=','v.persona_id')
                ->join('partidos as par','par.id','=','p.partido_id')
                ->join('aspirantes as a','v.aspirante_id','=','a.id')
                ->select('p.nombres as concejal','p.apellidos as concejalapellidos','p.partido_id','par.nombre','par.logo','a.nombres as aspirante','a.apellidos as aspiranteapellidos','v.fecha')
                ->where('v.tipoeleccion_id',$request->tipoeleccion_id)
                ->where('v.fecha',$request->fecha)
                ->get();
                $resultadosbancadas=DB::table('elecciones as v')
                ->join('personas as p','p.id','=','v.persona_id')
                ->join('partidos as par','par.id','=','p.partido_id')
                ->join('aspirantes as a','v.aspirante_id','=','a.id')
                ->select(DB::raw('COUNT(v.persona_id) as cantidad'),'p.partido_id','par.nombre','par.logo','a.nombres as aspirante','a.apellidos')
                ->where('v.tipoeleccion_id',$request->tipoeleccion_id)
                ->where('v.fecha',$request->fecha)
                ->groupBy('par.id','v.aspirante_id')
                ->get();
                return response()->view('ajax.resultadosunicos', compact( 'resultados', 'cantidad','nombre_eleccion','tipovotacion','resultadosn','resultadosbancadas'));
            }


        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validar=$this->validar($request->proyecto_id);
        if(count($validar)>0){
            return response()->json(['warning' => 'YA EXISTEN REGISTRO PARA ESTE PROYECTO']);
        }else {
            $resul=new ResultadoVotacion();
            $resul->proyecto_id=$request->proyecto_id;
            $resul->persona_id=auth()->user()->persona_id;
            $resul->rechazado=$request->rechazado;
            $resul->aprobado=$request->aprobado;
            $resul->fecha=Carbon::now()->format('Y-m-d');
            $resul->hora=Carbon::now()->format('h:i:s');

            $resul->save();
            if($resul){
                return response()->json(['success' => 'DATOS ALMACENADOS EXITOSAMENTE']);
            }else {
            return response()->json(['warning' => 'ERROR INTERNO']);

            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function validar($tipoeleccion_id,$fecha){
        return $validar=Eleccion::where('tipoeleccion_id', $tipoeleccion_id)
        ->where('fecha',$fecha)->get();

    }
}
