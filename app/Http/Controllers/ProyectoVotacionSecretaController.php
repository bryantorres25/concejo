<?php

namespace App\Http\Controllers;

use App\ProyectoVotacion;
use App\ProyectoVotacionSecreta;
use Illuminate\Http\Request;
use App\TipoVotacion;

class ProyectoVotacionSecretaController extends Controller
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
        $votaciones=ProyectoVotacionSecreta::all();

        if (request()->ajax()) {
            $votaciones = ProyectoVotacionSecreta::all();
            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($votaciones) == 0) {
                return response()->json(['warning' => 'Error en el servidor']);
            } else {
                //return response()->view('tablas.tb-tipo_votacion', compact('tipo_votaciones'));
            }
        }
        //return view('tipo_votaciones.index', compact('tipo_votaciones'));
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
        $validar=ProyectoVotacionSecreta::where('proyecto_id', $request->id)->get();
        if(count($validar)>0){
            return response()->json(['warning' => 'EL PROYECTO SELECCIONADO YA FUE ASIGNADO PARA VOTACIÓN']);
        }else{
            $proyecto= new ProyectoVotacionSecreta();
            $proyecto->proyecto_id=$request->id;
            $proyecto->persona_id=auth()->user()->persona_id;          
            $proyecto->fecha=$request->fecha;
            $proyecto->hora=$request->hora;
            $proyecto->tiempo=$request->tiempo;
            $proyecto->observaciones=$request->observaciones;
            $proyecto->estado_id=1;
            $proyecto->save();

            if($proyecto){
                return response()->json(['success' => 'PROYECTO AUTORIZADO PARA VOTACIÓN']);
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
        $obj = ProyectoVotacionSecreta::findOrFail($id);

        if ($obj->estado==1) {
            $obj->update(['estado' => 0]);
        } else {
            $obj->update(['estado' => 1]);
        }
        return response()->json(['success' => 'ESTADO ACTUALIZADO CON EXITO!']);
    }
}
