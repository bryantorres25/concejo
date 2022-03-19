<?php

namespace App\Http\Controllers;

use App\Proposicion;
use App\ProposicionVotacion;
use App\ResultadoVotacion;
use App\VotacionProposicion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultadoProposicionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

    }
    public function index()
    {
        $proposiciones=Proposicion::where('estado', 1)->get();
        return view('resultadosproposiciones.index', compact('proposiciones'));
    }

    public function filtro(Request $request)
    {
        if (request()->ajax()) {
            $proposicion_id=$request->proposicion_id;
            $fecha=$request->fecha;
            $nombre= Proposicion::where('id',$proposicion_id)->get();

            $resultados=VotacionProposicion::where('proposicion_id', $proposicion_id)
            ->where('fecha',$fecha)->get();

            $validar=count($resultados);
            $proposicionvotacion= ProposicionVotacion::where('proposicion_id',$proposicion_id)->get();
            foreach($proposicionvotacion as $n){
                $tipovotacion=$n->tipovotacion_id;

            }


            $resultadosbancadas=DB::table('votaciones_proposiciones as v')
            ->join('personas as p','p.id','=','v.persona_id')
            ->join('partidos as par','par.id','=','p.partido_id')
            ->select(DB::raw('COUNT(v.persona_id) as cantidad'),'p.partido_id','v.respuesta','par.nombre','par.logo')
            ->where('v.proposicion_id',$proposicion_id)
            ->where('v.fecha',$fecha)
            ->groupBy('par.id','v.respuesta')
            ->get();


            $resultadossecreto=DB::table('votaciones_proposiciones as v')
                ->select(DB::raw('COUNT(v.persona_id) as cantidad'),'v.respuesta')
                ->where('v.proposicion_id', $proposicion_id)
                ->groupBy('v.respuesta')
                ->get();

            return  response()->view('ajax.resultados-proposiciones', compact('resultados', 'validar','resultadosbancadas','nombre','tipovotacion','resultadossecreto'));
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



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


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
