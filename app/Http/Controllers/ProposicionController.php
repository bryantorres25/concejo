<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Proposicion;
use App\ProposicionVotacion;

class ProposicionController extends Controller
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
        $proposiciones = Proposicion::all();
        if (request()->ajax()) {
            $proposiciones = Proposicion::all();
            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($proposiciones) == 0) {
                //return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('tablas.tb-proposiciones', compact('proposiciones'));
            }
        }
        return view('proposiciones.index', compact('proposiciones','carpetas'));
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
        if ($request->hasFile('ruta')) {
            $file = $request->file('ruta');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/archivos_proposiciones/', $name);

            $pro = new Proposicion();
            $pro->nombre = $request->nombre;
            $pro->bancada = $request->bancada;
            $pro->descripcion = $request->descripcion;
            $pro->ruta = $name;
            $pro->estado =$request->estado;
            $pro->persona_id =auth()->user()->persona_id;
            $pro->save();


        } else{
            $pro = new Proposicion();
            $pro->nombre = $request->nombre;
            $pro->bancada = $request->bancada;
            $pro->descripcion = $request->descripcion;
            $pro->estado =$request->estado;
            $pro->persona_id =auth()->user()->persona_id;
            $pro->save();

        }

        if ($pro) {
            return response()->json(['success' => 'PROPOSICION CREADO CON EXITO!']);
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
        if (request()->ajax()) {

            if ($request->hasFile('ruta')) {
                $file = $request->file('ruta');
                $name = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/archivos_proposiciones/', $name);

                $exito = Proposicion::findOrFail($request->id)->update([
                    'nombre' => $request['nombre'],
                    'bancada' => $request['bancada'],
                    'descripcion' => $request['descripcion'],
                    'ruta' => $name,
                ]);

            } else {

                $exito = Proposicion::findOrFail($request->id)->update([
                    'nombre' => $request['nombre'],
                    'descripcion' => $request['descripcion'],
                    'bancada' => $request['bancada']

                ]);
            }

            if ($exito) {
                return response()->json(['success' => 'DATOS ACTUALIZADO CORRECTAMENTE']);
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
    public function eliminar($id)
    {
        $validar=ProposicionVotacion::where('proposicion_id', $id)->get();
        if(count($validar)>0){
            return response()->json(['warning' => 'ESTA PROPOSICION ESTA ASIGNADA PARA VOTACION Y NO SE PUEDE ELIMINAR!']);
        }else {
            $propociones = Proposicion::find($id);
        $propociones->delete();
        return response()->json(['success' => 'PROPOSICION ELIMINADA CON EXITO!']);
        }


    }



}
