<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partido;
use App\Cargos;
use App\Comision;
use App\Persona;
use App\Proponente;
use App\Proyecto;
use App\TipoVotacion;

class VisualizacionProyectoController extends Controller
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
        $proyectos = Proyecto::where('estado_vista', 1)->get();
        $personas = Persona::where('estado', 1)->get();
        $tipos = TipoVotacion::where('estado', 1)->get();
        $proponentes = Proponente::where('estado', 1)->get();
        $cantidad=count($proyectos);
        if (request()->ajax()) {
            $proyectos = Proyecto::all();
            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($proyectos) == 0) {
                //return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('tablas.tb-proyectosvisual', compact('proyectos', 'tipos'));
            }
        }
        return view('proyectosvisual.index', compact('proyectos', 'personas', 'tipos', 'proponentes','cantidad'));
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proyectos = Proyecto::where('id', $id)->get();
        $comisiones=Comision::all();
        $cantidad=count($proyectos);
        return view('proyectosvisual.show', compact('proyectos','cantidad','comisiones'));
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

}
