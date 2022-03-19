<?php

namespace App\Http\Controllers;

use App\Aspirante;
use App\Eleccion;
use Illuminate\Http\Request;
use App\Partido;
use App\TipoEleccion;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Element;

class EleccionController  extends Controller
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
        $elecciones = TipoEleccion::where('estado_vista', 1)->get();
        return view('elecciones.index', compact('elecciones'));
    }

    public function filtro(Request $request)
    {
        if (request()->ajax()) {
            $fecha = $request->fecha;
            $persona_id=auth()->user()->persona_id;
            $teleccion=TipoEleccion::where('fecha',$fecha)
            ->where('estado_vista',1)
            ->where('id',$request->tipoeleccion_id)
            ->get();
            $cantidadt=count($teleccion);
            $persona=Eleccion::where('persona_id',$persona_id)
            ->where('fecha',$fecha)
            ->where('tipoeleccion_id',$request->tipoeleccion_id)
            ->get();
            $cantidad_persona=count($persona);
            $nombre_eleccion = TipoEleccion::where('id', $request->tipoeleccion_id)->get();
            $id = $request->tipoeleccion_id;
            $aspirantes = Aspirante::consulta($id);
            $cantidad = count($aspirantes);
            return response()->view('ajax.filtro-aspirantes', compact('aspirantes', 'cantidadt','nombre_eleccion', 'cantidad','cantidad_persona','fecha'));
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
            $tipo=$request->tipoeleccion_id;
            $elecciones = $request->input('opciones');
            if ($elecciones=="") {
                return response()->json(['warning' => 'NO HAY OPCIONES SELECCIONADAS']);
            } else {
                $cantidad = count($elecciones);
                if ($cantidad > 1) {
                    return response()->json(['warning' => 'DEBE SELECCIONAR UN SOLO ASPIRANTE']);
                } else {
                    foreach ($elecciones as $eleccion) {
                        $eleccione = new Eleccion;
                        $eleccione->fecha = $fecha;
                        $eleccione->persona_id = $persona_id;
                        $eleccione->tipoeleccion_id = $tipo;
                        $eleccione->aspirante_id = $eleccion;
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
