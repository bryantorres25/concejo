<?php

namespace App\Http\Controllers;

use App\Asistencia;
use App\ProyectoVotacion;
use App\ProyectoVotacionSecreta;
use App\ResultadoVotacion;
use App\ResultadoVotacionSecreta;
use App\Votacion;
use App\VotacionSecreta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ResultadoSecretoController extends Controller
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
        $proyectos=ProyectoVotacionSecreta::where('estado_id', 1)->get();
        return view('resultadossecreto.index', compact('proyectos'));
    }
    public function filtro(Request $request)
    {
        if (request()->ajax()) {          
            $validar=$this->validar($request->proyecto_id);            
            $resultados=VotacionSecreta::where('proyecto_id', $request->proyecto_id)->get();          
            
            return response()->view('ajax.resultadossecreto', compact( 'resultados', 'validar'));
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
            $resul=new ResultadoVotacionSecreta();
            $resul->proyecto_id=$request->proyecto_id;
            $resul->rechazado=$request->rechazado;
            $resul->aprobado=$request->aprobado;
            $resul->fecha=Carbon::now()->format('Y-m-d');
            $resul->hora=Carbon::now()->format('h:i:s');
    
            $resul->save();
            if($resul){
                return redirect()->route('home');
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

    public function validar($proyecto_id){
        return $validar=ResultadoVotacionSecreta::where('proyecto_id', $proyecto_id)
        ->where('estado', '1')->get();

    }
}
