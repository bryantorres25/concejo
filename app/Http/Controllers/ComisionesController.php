<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comision;

class ComisionesController extends Controller
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
        $comisiones = Comision::all();


        if (request()->ajax()) {
            $comisiones = Comision::all();
            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($comisiones) == 0) {
                return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('tablas.tb-comisiones', compact('comisiones'));
            }
        }
        return view('comisiones.index', compact('comisiones'));
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
        $exito = Comision::create($request->all());
        if ($exito) {
            return response()->json(['success' => 'COMISION CREADOA CON EXITO!']);
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
            $exito = Comision::findOrFail($request->id)->update($request->all());
            if ($exito) {
                return response()->json(['success' => 'COMISION ACTUALIZADA CORRECTAMENTE']);
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
        $cargo = Comision::findOrFail($id);

        if ($cargo->estado == 1) {
            $cargo->update(['estado' => 0]);
        } else {
            $cargo->update(['estado' => 1]);
        }
        return response()->json(['success' => 'ESTADO DE COMISION ACTUALIZADO CON EXITO!']);
    }
}
