<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cargos;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    
    public function index()
    {
        $cargos = Cargos::all();

        if (request()->ajax()) {
            $cargos = Cargos::all();
            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($cargos) == 0) {
                return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('tablas.tb-cargos', compact('cargos'));
            }
        }
        return view('cargos.index', compact('cargos'));
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
        $exito = Cargos::create($request->all());
        if ($exito) {
            return response()->json(['success' => 'CARGO CREADO CON EXITO!']);
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
            $exito = Cargos::findOrFail($request->id)->update($request->all());
            if ($exito) {
                return response()->json(['success' => 'CARGO ACTUALIZADO CORRECTAMENTE']);
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
        $cargo = Cargos::findOrFail($id);

        if ($cargo->estado == 1) {
            $cargo->update(['estado' => 0]);
        } else {
            $cargo->update(['estado' => 1]);
        }
        return response()->json(['success' => 'ESTADO DE CARGO ACTUALIZADO CON EXITO!']);
    }
}
