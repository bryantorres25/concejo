<?php

namespace App\Http\Controllers;

use App\ProposicionVotacion;
use App\ProyectoVotacion;
use App\ProyectoVotacionSecreta;
use App\Votacion;
use App\VotacionProposicion;
use App\VotacionSecreta;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VotacionProposicionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()

    {
        $persona=auth()->user()->persona_id;
        $date=Carbon::now('America/Bogota')->format('Y-m-d');

        $votaciones=ProposicionVotacion::where('estado_id', '1')
        ->where('fecha', $date)->get();
        $cantidad=count($votaciones);
        if($cantidad>0){
            foreach($votaciones as $v){
                $validar=VotacionProposicion::where('proposicion_id',$v->proposicion_id)
                ->where('persona_id', $persona)->get();
                $filas=count($validar);
            }
        }else{
            $filas=0;
        }

        return view('votaciones-proposiciones.index', compact('votaciones', 'cantidad', 'filas'));



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
        $date=Carbon::now('America/Bogota')->format('Y-m-d');
        $hour=Carbon::now('America/Bogota')->format('h:i:s');
        $votacion=new VotacionProposicion();
        $votacion->proposicion_id=$request->proposicion_id;
        $votacion->persona_id=auth()->user()->persona_id;
        $votacion->respuesta=$request->respuesta;
        $votacion->fecha=$date;
        $votacion->hora=$hour;
        $votacion->observaciones=$request->observaciones;
        $votacion->save();
        return response()->json(['success' => 'VOTO REGISTRADO CON EXITO']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $persona=auth()->user()->persona_id;

        $date=Carbon::now('America/Bogota')->format('Y-m-d');
        $votaciones=ProposicionVotacion::where('id',$id)->get();
        $filas=$this->validar($votaciones[0]->proposicion_id, $persona);

        $cantidad=count($votaciones);

        return view('votaciones-proposiciones.show', compact('votaciones', 'cantidad', 'filas'));
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

    public function validar($proposicion_id, $persona){
        $validar=VotacionProposicion::where('proposicion_id', $proposicion_id)
        ->where('persona_id', $persona)->get();
        $filas=count($validar);
        return $filas;
    }

    public function getViewSecreta()

    {
        $persona=auth()->user()->persona_id;
        $date=Carbon::now('America/Bogota')->format('Y-m-d');

        $votaciones=ProyectoVotacionSecreta::where('estado_id', '1')
        ->where('fecha', $date)->get();

        $cantidad=count($votaciones);
        if($cantidad>0){
            foreach($votaciones as $v){
                $validar=VotacionSecreta::where('proyecto_id',$v->proyecto_id) ->where('persona_id', $persona)
                ->get();
                $filas=count($validar);
            }
        }else{
            $filas=0;
        }


        return view('votaciones-secreta.index', compact('votaciones', 'cantidad', 'filas'));



    }

    public function getShowSecreta($id)
    {
        $persona=auth()->user()->persona_id;

        $date=Carbon::now('America/Bogota')->format('Y-m-d');
        $votaciones=ProyectoVotacionSecreta::where('id',$id)->get();
        foreach($votaciones as $v){
            $validar=VotacionSecreta::where('proyecto_id',$v->proyecto_id) ->where('persona_id', $persona)
            ->get();
            $filas=count($validar);
        }


        $cantidad=count($votaciones);

        return view('votaciones-secreta.show', compact('votaciones', 'cantidad', 'filas'));
    }

    public function storeSecreta(Request $request)
    {

        $date=Carbon::now('America/Bogota')->format('Y-m-d');
        $hour=Carbon::now('America/Bogota')->format('h:i:s');
        $votacion=new VotacionSecreta();
        $votacion->proyecto_id=$request->proyecto_id;
        $votacion->persona_id=auth()->user()->persona_id;
        $votacion->respuesta=$request->respuesta;
        $votacion->fecha=$date;
        $votacion->hora=$hour;
        $votacion->observaciones='';
        $votacion->save();
        return response()->json(['success' => 'VOTO SECRETO REGISTRADO CON EXITO']);
    }
}
