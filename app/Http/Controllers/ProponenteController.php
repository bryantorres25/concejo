<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proponente;
class ProponenteController extends Controller
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
        $proponentes=Proponente::all();

        if (request()->ajax()) {
            $proponentes = Proponente::all();
            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($proponentes) == 0) {
                return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('tablas.tb-proponentes', compact('proponentes'));
            }
        }
        return view('proponentes.index', compact('proponentes'));

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
        $exito= Proponente::create($request->all());
        if($exito){
            return response()->json(['success' => 'PROPONENTE CREADA CON EXITO!']);
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
            $exito=Proponente::findOrFail($request->id)->update($request->all());
            if($exito){
                return response()->json(['success' => 'PROPONENTE ACTUALIZADA CORRECTAMENTE']);
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
        $proponente = Proponente::findOrFail($id);

        if ($proponente->estado==1) {
            $proponente->update(['estado' => 0]);
        } else {
            $proponente->update(['estado' => 1]);
        }
        return response()->json(['success' => 'ESTADO DE PROPONENTE ACTUALIZADO CON EXITO!']);
    }
}
