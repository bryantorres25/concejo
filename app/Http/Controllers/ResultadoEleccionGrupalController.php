<?php

namespace App\Http\Controllers;

use App\Asistencia;
use App\Eleccion;
use App\EleccionSocial;
use App\ProyectoVotacion;
use App\ResultadoVotacion;
use App\ResultadoVotacionUnica;
use App\TipoEleccion;
use App\TipoEleccionSocial;
use App\Votacion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultadoEleccionGrupalController extends Controller
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
        $tipoeleccion=TipoEleccionSocial::where('estado_vista', 1)->get();
        return view('resultadoelecciongrupal.index', compact('tipoeleccion'));
    }
    public function filtro(Request $request)
    {
        if (request()->ajax()) {     

            $validar=$this->validar($request->tipoeleccion_id,$request->fecha);  
            $nombre_eleccion= TipoEleccionSocial::where('id',$request->tipoeleccion_id)->get();      
            $cantidad=count($validar);   
            $resultados=DB::table('elecciones_social as e')
            ->join('aspirantes_grupales as a','e.aspirantegrupal_id','=','a.id')
            ->join('tipoeleccionessociales as t','a.eleccionsocial_id','=','t.id')
            ->select(DB::raw('COUNT(e.aspirantegrupal_id) as votos') ,'t.nombre as eleccion','t.id','e.aspirantegrupal_id','a.nombres','a.apellidos','a.foto')
            ->groupBy('e.aspirantegrupal_id')
            ->where('e.eleccionsocial_id',$request->tipoeleccion_id)
            ->where('e.fecha',$request->fecha)
            ->get();        
            
            return response()->view('ajax.resultadosgrupales', compact( 'resultados', 'cantidad','nombre_eleccion'));
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

        $validar=$this->validar($request->proyecto_id);
        if(count($validar)>0){
            return response()->json(['warning' => 'YA EXISTEN REGISTRO PARA ESTE PROYECTO']);
        }else {
            $resul=new ResultadoVotacion();
            $resul->proyecto_id=$request->proyecto_id;
            $resul->persona_id=auth()->user()->persona_id;
            $resul->rechazado=$request->rechazado;
            $resul->aprobado=$request->aprobado;
            $resul->fecha=Carbon::now()->format('Y-m-d');
            $resul->hora=Carbon::now()->format('h:i:s');
    
            $resul->save();
            if($resul){
                return response()->json(['success' => 'DATOS ALMACENADOS EXITOSAMENTE']);
            }else {
            return response()->json(['warning' => 'ERROR INTERNO']);
    
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

    public function validar($tipoeleccion_id,$fecha){
        return $validar=EleccionSocial::where('eleccionsocial_id', $tipoeleccion_id)
        ->where('fecha',$fecha)->get();

    }
}
