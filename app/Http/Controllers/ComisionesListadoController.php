<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comision;

class ComisionesListadoController  extends Controller
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

    public function getComision($id)
    {

        if(request()->ajax()){
            $resul=Comision::where('tipo', $id)->get();
            return response()->json($resul);
        }
    }

    public function index()
    {
        return view('comisiones.listado');
    }

    public function filtro(Request $request)
    {
        if (request()->ajax()) {
            $nombre_comision=Comision::where('id',$request->comision_id)->select('nombre')->get();
            $tipo = $request->tipo;
            $comision_id=$request->comision_id;
            $comisiones=Comision::consulta($tipo,$comision_id);
            $cantidad=count($comisiones);
            return response()->view('ajax.filtro-comision', compact( 'comisiones','nombre_comision','cantidad'));
        }

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
