<?php

namespace App\Http\Controllers;

use App\Comision;
use App\EleccionComision;
use App\Plancha;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Element;

class EleccionComisionConcejalController  extends Controller
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

        return view('eleccion-comisiones-concejal.index',compact('nombreplanchas','comisiones','planchas','cantidad_persona','cantidad_plancha'));
    }

    public function detalles(Request $request,$id){

        if (request()->ajax()) {


            $detallesplancha = DB::table('detalles_plancha as d')
        ->join('personas as per','per.id','=','d.persona_id')
        ->join('comisiones as  c','c.id','=','d.comision_id')
        ->select('c.nombre as comision')
        ->groupBy('d.comision_id')
        ->where('d.plancha_id',$id)
        ->get();

        //return response()->view('ajax.filtro-comisiones-concejal', compact('detallesplancha'));
            //return response($resultado);
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
        if (request()->ajax()) {

            $fecha = Carbon::now()->format('Y-m-d');
            $persona_id = $request->persona_id;
            $elecciones = $request->input('opciones');
            if ($elecciones=="") {
                return response()->json(['warning' => 'NO HAY OPCIONES SELECCIONADAS']);
            } else {
                $cantidad = count($elecciones);
                if ($cantidad > 1) {
                    return response()->json(['warning' => 'DEBE SELECCIONAR UNA SOLA PLANCHA']);
                } else {
                    foreach ($elecciones as $eleccion) {
                        $eleccione = new EleccionComision();
                        $eleccione->fecha = $fecha;
                        $eleccione->persona_id = $persona_id;
                        $eleccione->plancha_id = $eleccion;
                        $eleccione->save();
                    }

                    if ($eleccione) {
                        return response()->json(['success' => ' VOTO GUARDADO CON EXITO!']);
                    }
                }
            }
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
        $idplancha=$id;
        $plancha=Plancha::find($idplancha);
        $nombre_plancha=$plancha->nombre;
        $comisiones=Comision::where('id','!=',7)->get();

        return view('eleccion-comisiones-concejal.show',compact('idplancha','comisiones','nombre_plancha'));
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
            return response()->view('ajax.filtro-comision-concejal', compact( 'comisiones','nombre_comision','cantidad'));
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
