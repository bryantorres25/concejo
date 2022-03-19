<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoVotacion;

class TipoVotacionController extends Controller
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
        $tipo_votaciones=TipoVotacion::all();

        if (request()->ajax()) {
            $tipo_votaciones = TipoVotacion::all();
            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($tipo_votaciones) == 0) {
                return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('tablas.tb-tipo_votacion', compact('tipo_votaciones'));
            }
        }
        return view('tipo_votaciones.index', compact('tipo_votaciones'));
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
        $exito= TipoVotacion::create($request->all());
        if($exito){
            return response()->json(['success' => 'TIPO VOTACIÓN CREADO CON EXITO!']);
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
        if (request()->ajax()) {
            $exito=TipoVotacion::findOrFail($request->id)->update($request->all());
            if($exito){
                return response()->json(['success' => 'TIPO VOTACIÓN ACTUALIZADA CORRECTAMENTE']);
            }
            
        }
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
        $partido = TipoVotacion::findOrFail($id);

        if ($partido->estado==1) {
            $partido->update(['estado' => 0]);
        } else {
            $partido->update(['estado' => 1]);
        }
        return response()->json(['success' => 'ESTADO DE TIPO VOTACIÓN ACTUALIZADO CON EXITO!']);
    }
}
