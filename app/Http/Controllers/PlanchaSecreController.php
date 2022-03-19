<?php

namespace App\Http\Controllers;

use App\Comision;
use App\EleccionComision;
use App\Plancha;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Element;

class PlanchaSecreController  extends Controller
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
        $persona_id=auth()->user()->persona_id;
        $nombreplanchas = Plancha::all();
        $comisiones = Comision::where('id','!=',7)->get();
        $planchas=DB::table('plancha as p')
        ->join('personas as per','p.postulante_id','=','per.id')
        ->select('p.id','per.nombres','per.apellidos','p.nombre','per.foto')
        ->get();

        $persona=EleccionComision::where('persona_id',$persona_id)
        ->get();
        $cantidad_persona=count($persona);
        $cantidad_plancha=count($planchas);

        return view('planchassecre.index',compact('nombreplanchas','comisiones','planchas','cantidad_persona','cantidad_plancha'));
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


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $idplancha=$id;
        $plancha=Plancha::find($idplancha);
        $nombre_plancha=$plancha->nombre;
        $comisiones=Comision::where('id','!=',7)->get();

        return view('planchassecre.show',compact('idplancha','comisiones','nombre_plancha'));
    }

    public function filtro(Request $request)
    {
        if (request()->ajax()) {
            $nombre_comision=Comision::where('id',$request->comision_id)->select('nombre')->get();
            $idplancha = $request->plancha_id;
            $comision_id=$request->comision_id;
            $comisiones= DB::table('detalles_plancha as d')
            ->join('personas as per','per.id','=','d.persona_id')
            ->join('comisiones as  c','c.id','=','d.comision_id')
            ->join('partidos as par','per.partido_id','=','par.id')
            ->select('c.nombre as comision','per.foto','par.logo','per.nombres','per.apellidos')
            ->where('d.plancha_id',$idplancha)
            ->where('d.comision_id',$comision_id)
            ->get();
            $cantidad=count($comisiones);
            return response()->view('ajax.filtro-plancha', compact( 'comisiones','nombre_comision','cantidad'));
        }

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
