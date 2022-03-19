<?php

namespace App\Http\Controllers;

use App\Asistencia;
use App\Proyecto;
use App\ProyectoVotacion;
use App\ResultadoVotacion;
use App\Votacion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
       // $this->middleware('admin');
        $this->middleware('auth');
    }
    public function index()
    {
        $proyectos=ProyectoVotacion::where('estado_id', 1)->get();
        return view('resultados.index', compact('proyectos'));
    }
    public function filtro(Request $request)
    {
        if (request()->ajax()) {
            $proyectovotacion= ProyectoVotacion::where('proyecto_id',$request->proyecto_id)->get();
            foreach($proyectovotacion as $n){
                $tipovotacion=$n->tipovotacion_id;
            }
            $validar=$this->validar($request->proyecto_id);
            $resultados=Votacion::where('proyecto_id', $request->proyecto_id)->get();
            $cantidadresultado=count($resultados);
            $resultadosbancadas=DB::table('votaciones as v')
            ->join('personas as p','p.id','=','v.persona_id')
            ->join('partidos as par','par.id','=','p.partido_id')
            ->select(DB::raw('COUNT(v.persona_id) as cantidad'),'p.partido_id','v.respuesta','par.nombre','par.logo')
            ->where('v.proyecto_id',$request->proyecto_id)
            ->groupBy('par.id','v.respuesta')
            ->get();
            $resultadossecreto=DB::table('votaciones as v')
            ->select(DB::raw('COUNT(v.persona_id) as cantidad'),'v.respuesta')
            ->where('v.proyecto_id', $request->proyecto_id)
            ->groupBy('v.respuesta')
            ->get();


            return response()->view('ajax.resultados', compact( 'resultados', 'validar','resultadosbancadas','tipovotacion','resultadossecreto','cantidadresultado'));
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


