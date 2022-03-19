<?php

namespace App\Http\Controllers;

use App\CarpetasRecursos;
use Illuminate\Http\Request;
use App\Recurso;

class VisualizacionRecursoController extends Controller
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

        $carpetas = CarpetasRecursos::where('estado', 1)->get();

        $cantidad=count($carpetas);
        return view('recursosvisual.index', compact('carpetas','cantidad'));
    }

    public function getrecursos($id){
        $recursos = Recurso::where('carpeta_recurso_id',$id)->where('estado', 1)->get();
        $cantidad=count($recursos);
        $nombrecarpeta = CarpetasRecursos::find($id);
        $carpetas=$nombrecarpeta->nombre;
        return view('tablas.carpetas', compact('recursos','cantidad','carpetas'));
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

}
