<?php

namespace App\Http\Controllers;

use App\Asistencia;
use App\Proyecto;
use App\ProyectoVotacion;
use App\ResultadoVotacion;
use App\TipoEleccionSocial;
use App\Votacion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultadoComisionController extends Controller
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
        return view('resultados-comisiones.index');
    }
    public function filtro(Request $request)
    {
        if (request()->ajax()) {
            $fecha=$request->fecha;
            $tipovotacion=TipoEleccionSocial::all();
            foreach($tipovotacion as $tipo){
                $tipov=$tipo->tipovotacion_id;
            }

            if ($tipov==1) {
                $resultadosn=DB::table('elecciones_comisiones as v')
                ->join('personas as p','p.id','=','v.persona_id')
                ->join('partidos as par','par.id','=','p.partido_id')
                ->join('plancha as a','v.plancha_id','=','a.id')
                ->select('p.nombres','p.apellidos','p.partido_id','par.nombre','par.logo','a.nombre as plancha','v.fecha')
                ->where('v.fecha',$fecha)
                ->get();
                $resultadossecreto=DB::table('elecciones_comisiones as v')
                ->join('plancha as p','p.id','=','v.plancha_id')
                ->select(DB::raw('COUNT(v.persona_id) as cantidad'),'v.plancha_id','p.nombre as plancha')
                ->groupBy('v.plancha_id')
                ->where('v.fecha',$fecha)
                ->get();
                return response()->view('ajax.resultadoscomision', compact( 'resultadosn','tipov','resultadossecreto'));
            }else {
                $resultadossecreto=DB::table('elecciones_comisiones as v')
                ->join('plancha as p','p.id','=','v.plancha_id')
                ->select(DB::raw('COUNT(v.persona_id) as cantidad'),'v.plancha_id','p.nombre as plancha')
                ->groupBy('v.plancha_id')
                ->where('v.fecha',$fecha)
                ->get();
                return response()->view('ajax.resultadoscomision', compact('tipov','resultadossecreto'));
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

    public function validar($proyecto_id){
        return $validar=ResultadoVotacion::where('proyecto_id', $proyecto_id)
        ->where('estado', '1')->get();

    }



}


