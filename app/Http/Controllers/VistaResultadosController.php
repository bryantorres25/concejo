<?php

namespace App\Http\Controllers;

use App\Proposicion;
use App\ProposicionVotacion;
use App\ProyectoVotacion;
use App\TipoEleccion;
use Illuminate\Http\Request;


class VistaResultadosController extends Controller
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
        return view('vistaresultados.index');
    }

    public function resultadop()
    {
        $proyectos=ProyectoVotacion::where('estado_id', 1)->get();
        return view('resultados.resultadosp',compact('proyectos'));
    }

    public function resultadopro()
    {
        $proposiciones=ProposicionVotacion::where('estado', 1)->get();
        return view('resultadosproposiciones.resultadospro', compact('proposiciones'));
    }

    public function resultadose()
    {
        $tipoeleccion=TipoEleccion::where('estado', 1)->get();
        return view('resultadoseleccionunica.resultadose', compact('tipoeleccion'));
    }

    public function resultadoscom()
    {
        $tipoeleccion=TipoEleccion::where('estado', 1)->get();
        return view('resultados-comisiones.resultadoscom', compact('tipoeleccion'));
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
        //
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


