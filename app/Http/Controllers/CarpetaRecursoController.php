<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CarpetasRecursos;

class CarpetaRecursoController extends Controller
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
        $carpetas = CarpetasRecursos::all();
        

        if (request()->ajax()) {
            $carpetas = CarpetasRecursos::all();
            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($carpetas) == 0) {
                return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('tablas.tb-carpetas_recursos', compact('carpetas'));
            }
        }
        return view('carpetas_recursos.index', compact('carpetas'));
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
        $exito = CarpetasRecursos::create($request->all());
        if ($exito) {
            return response()->json(['success' => 'CARPETAS CREADOA CON EXITO!']);
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
            $exito = CarpetasRecursos::findOrFail($request->id)->update($request->all());
            if ($exito) {
                return response()->json(['success' => 'CARPETA ACTUALIZADA CORRECTAMENTE']);
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
        $cargo = CarpetasRecursos::findOrFail($id);

        if ($cargo->estado == 1) {
            $cargo->update(['estado' => 0]);
        } else {
            $cargo->update(['estado' => 1]);
        }
        return response()->json(['success' => 'ESTADO DE CARPETA ACTUALIZADO CON EXITO!']);
    }
}
