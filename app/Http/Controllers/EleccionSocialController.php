<?php

namespace App\Http\Controllers;

use App\Aspirante;
use App\AspiranteGrupal;
use App\Eleccion;
use App\EleccionSocial;
use Illuminate\Http\Request;
use App\Partido;
use App\TipoEleccion;
use App\TipoEleccionSocial;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Element;

class EleccionSocialController  extends Controller
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
        $eleccionessociales = TipoEleccionSocial::where('estado_vista', 1)->get();
        return view('eleccionesgrupales.index', compact('eleccionessociales'));
    }

    public function filtro(Request $request)
    {
        if (request()->ajax()) {
            $fecha = $request->fecha;
            $persona_id=auth()->user()->persona_id;
            $teleccion=TipoEleccionSocial::where('fecha',$fecha)
            ->where('estado_vista',1)
            ->where('id',$request->eleccionsocial_id)
            ->get();
            $cantidadt=count($teleccion);
            $persona=EleccionSocial::where('persona_id',$persona_id)
            ->where('fecha',$fecha)
            ->where('eleccionsocial_id',$request->eleccionsocial_id)
            ->get();
            $cantidad_persona=count($persona);
            $nombre_eleccion = TipoEleccionSocial::where('id', $request->eleccionsocial_id)->get();
            $id = $request->eleccionsocial_id;
            $aspirantesgrupales = AspiranteGrupal::consulta($id);
            $cantidad = count($aspirantesgrupales);
            return response()->view('ajax.filtro-aspirantesgrupales', compact('aspirantesgrupales','cantidadt', 'nombre_eleccion', 'cantidad','cantidad_persona','fecha'));
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

            $fecha = $request->fecha;
            $persona_id = $request->persona_id;
            $tipo=$request->eleccionsocial_id;
            $eleccionessociales = $request->input('opciones');
            if ($eleccionessociales=="") {
                return response()->json(['warning' => 'NO HAY OPCIONES SELECCIONADAS']);
            } else {
                //$cantidad = count($eleccionessociales);
                //if ($cantidad > 3) {
                    //return response()->json(['warning' => 'DEBE SELECCIONAR 3 ASPIRANTES']);
                //} else {
                    foreach ($eleccionessociales as $eleccion) {
                        $eleccione = new EleccionSocial();
                        $eleccione->fecha = $fecha;
                        $eleccione->persona_id = $persona_id;
                        $eleccione->eleccionsocial_id = $tipo;
                        $eleccione->aspirantegrupal_id = $eleccion;
                        $eleccione->save();
                    }

                    if ($eleccione) {
                        return response()->json(['success' => ' VOTO GUARDADO CON EXITO!']);
                    }
                //}
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
