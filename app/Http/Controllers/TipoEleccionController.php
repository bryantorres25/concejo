<?php

namespace App\Http\Controllers;

use App\TipoEleccion;
use Illuminate\Http\Request;
use App\TipoVotacion;

class TipoEleccionController extends Controller
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
        $tipoelecciones=TipoEleccion::all();
        $tipovotaciones=TipoVotacion::all();
        if (request()->ajax()) {
            $tipoelecciones = TipoEleccion::all();
            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($tipoelecciones) == 0) {
                return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('tablas.tb-tipo_elecciones', compact('tipoelecciones'));
            }
        }
        return view('tipoelecciones.index', compact('tipoelecciones','tipovotaciones'));
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
        $exito= TipoEleccion::create($request->all());
        if($exito){
            return response()->json(['success' => 'ELECCION CREADO CON EXITO!']);
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
            $exito=TipoEleccion::findOrFail($request->id)->update($request->all());
            if($exito){
                return response()->json(['success' => 'ELECCION ACTUALIZADA CORRECTAMENTE']);
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
        $tipoeleccion = TipoEleccion::findOrFail($id);

        if ($tipoeleccion->estado==1) {
            $tipoeleccion->update(['estado' => 0]);
        } else {
            $tipoeleccion->update(['estado' => 1]);
        }
        return response()->json(['success' => 'ESTADO ACTUALIZADO CON EXITO!']);
    }

    public function changevista($id)
    {
        $tipoeleccion = TipoEleccion::findOrFail($id);

        if ($tipoeleccion->estado_vista==1) {
            $tipoeleccion->update(['estado_vista' => 0]);
        } else {
            $tipoeleccion->update(['estado_vista' => 1]);
        }
        return response()->json(['success' => 'ESTADO ELECCION ACTUALIZADO CON EXITO!']);
    }
}
