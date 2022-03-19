<?php

namespace App\Http\Controllers;

use App\TipoEleccion;
use App\TipoEleccionSocial;
use Illuminate\Http\Request;
use App\TipoVotacion;

class TipoEleccionSocialController extends Controller
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
        $eleccionessociales=TipoEleccionSocial::all();
        $tipovotaciones=TipoVotacion::where('estado', 1)->get();

        if (request()->ajax()) {
            $eleccionessociales = TipoEleccionSocial::all();
            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($eleccionessociales) == 0) {
                return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('tablas.tb-eleccionessociales', compact('eleccionessociales'));
            }
        }
        return view('eleccionessociales.index', compact('eleccionessociales','tipovotaciones'));
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
        $exito= TipoEleccionSocial::create($request->all());
        if($exito){
            return response()->json(['success' => 'TIPO ELECCION CREADO CON EXITO!']);
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
            $exito=TipoEleccionSocial::findOrFail($request->id)->update($request->all());
            if($exito){
                return response()->json(['success' => 'TIPO ELECCION ACTUALIZADA CORRECTAMENTE']);
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
        $eleccionessociales = TipoEleccionSocial::findOrFail($id);

        if ($eleccionessociales->estado==1) {
            $eleccionessociales->update(['estado' => 0]);
        } else {
            $eleccionessociales->update(['estado' => 1]);
        }
        return response()->json(['success' => 'ESTADO DE TIPO ELECCION ACTUALIZADO CON EXITO!']);
    }

    public function changevista($id)
    {
        $eleccionessociales = TipoEleccionSocial::findOrFail($id);
        if ($eleccionessociales->estado_vista==1) {
            $eleccionessociales->update(['estado_vista' => 0]);
        } else {
            $eleccionessociales->update(['estado_vista' => 1]);
        }
        return response()->json(['success' => 'ESTADO DE TIPO ELECCION ACTUALIZADO CON EXITO!']);
    }
}
