<?php

namespace App\Http\Controllers;

use App\Proposicion;
use App\ProposicionVotacion;
use App\ProyectoVotacion;
use Illuminate\Http\Request;
use App\TipoVotacion;

class ProposicionVotacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('auth');
    }
    public function index()
    {
        $proposiciones=Proposicion::all();
        $tipovotaciones=TipoVotacion::all();
        return view('proposiciones-votaciones.index', compact('proposiciones','tipovotaciones'));
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
        $validarp=Proposicion::where('id', $request->id)->get();
        if (count($validarp)>0) {
            $validar=ProposicionVotacion::where('proposicion_id', $request->id)->get();
            if(count($validar)>0){
                return response()->json(['warning' => 'YA FUE ASIGNADO PARA VOTACIÓN']);
            }else{
                $proposicion= new ProposicionVotacion();
                $proposicion->proposicion_id=$request->id;
                $proposicion->persona_id=auth()->user()->persona_id;
                $proposicion->fecha=$request->fecha;
                $proposicion->hora=$request->hora;
                $proposicion->tiempo=$request->tiempo;
                $proposicion->tipovotacion_id=$request->tipovotacion_id;
                $proposicion->estado_id=1;
                $proposicion->save();

                if($proposicion){
                    return response()->json(['success' => 'PROPOSICION AUTORIZADO PARA VOTACIÓN']);
                }else {
                return response()->json(['warning' => 'ERROR INTERNO']);

                }
            }
        } else {
            return response()->json(['warning' => 'ESTA PROPOSICION YA FUE ELIMINADA']);
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

    public function change($id)
    {
        $obj = ProposicionVotacion::findOrFail($id);

        if ($obj->estado==1) {
            $obj->update(['estado' => 0]);
        } else {
            $obj->update(['estado' => 1]);
        }
        return response()->json(['success' => 'ESTADO ACTUALIZADO CON EXITO!']);
    }
}
