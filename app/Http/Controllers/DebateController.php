<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partido;
use App\Cargos;
use App\Ciudadano;
use App\Debates;
use App\Persona;
use App\Proponente;
use App\Proyecto;
use App\TipoVotacion;

class DebateController extends Controller
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
        $debates = Debates::all();
        $ciudadanos = Ciudadano::where('estado', 1)->get();

        if (request()->ajax()) {
            $debates = Debates::all();
            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($debates) == 0) {
                //return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('tablas.tb-debates', compact('debates'));
            }
        }
        return view('ciudadanos.index_debates', compact('debates', 'ciudadanos'));
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
        $exito= Debates::create($request->all());
        if($exito){
            return response()->json(['success' => 'DEBATE CREADO CON EXITO!']);
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
            $exito=Debates::findOrFail($request->id)->update($request->all());
            if($exito){
                return response()->json(['success' => 'DEBATE ACTUALIZADO CORRECTAMENTE']);
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
        $debates = Debates::findOrFail($id);

        if ($debates->estado == 1) {
            $debates->update(['estado' => 0]);
        } else {
            $debates->update(['estado' => 1]);
        }
        return response()->json(['success' => 'ESTADO DE DEBATE ACTUALIZADO CON EXITO!']);
    }
   
}
  