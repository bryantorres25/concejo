<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ciudadano;
class CiudadanoController extends Controller
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
        $ciudadanos=Ciudadano::all();

        if (request()->ajax()) {
            $ciudadanos = Ciudadano::all();
            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($ciudadanos) == 0) {
                return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('tablas.tb-ciudadanos', compact('ciudadanos'));
            }
        }
        return view('ciudadanos.index', compact('ciudadanos'));

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
        $exito= Ciudadano::create($request->all());
        if($exito){
            return response()->json(['success' => 'CIUDADANO CREADA CON EXITO!']);
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
        if (request()->ajax()) {
            $exito=Ciudadano::findOrFail($request->id)->update($request->all());
            if($exito){
                return response()->json(['success' => 'CIUDADANO ACTUALIZADO CORRECTAMENTE']);
            }
            
        }
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
    public function change($id)
    {
        $ciudadano = Ciudadano::findOrFail($id);

        if ($ciudadano->estado==1) {
            $ciudadano->update(['estado' => 0]);
        } else {
            $ciudadano->update(['estado' => 1]);
        }
        return response()->json(['success' => 'ESTADO DE CIUDADANO ACTUALIZADO CON EXITO!']);
    }
}
