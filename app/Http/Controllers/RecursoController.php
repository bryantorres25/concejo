<?php

namespace App\Http\Controllers;

use App\CarpetasRecursos;
use Illuminate\Http\Request;

use App\Recurso;



class RecursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        //$this->middleware('admin');
        $this->middleware('auth');
    }
    public function index()
    {
        $recursos = Recurso::all();

        $carpetas = CarpetasRecursos::where('estado', 1)->get();

        if (request()->ajax()) {
            $recursos = Recurso::all();
            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($recursos) == 0) {
                //return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('tablas.tb-recursos', compact('recursos'));
            }
        }
        return view('recursos.index', compact('recursos','carpetas'));
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
            $file->move(public_path() . '/archivos_recursos/', $name);

            $recurso = new Recurso();
        $recurso->nombre = $request->nombre;
        $recurso->link = $request->link;
        $recurso->ruta = $name;
        $recurso->carpeta_recurso_id =$request->carpeta_recurso_id;
        $recurso->estado =$request->estado;
        $recurso->save();



        } else {

            $recurso = new Recurso();
            $recurso->nombre = $request->nombre;
            $recurso->link = $request->link;
            $recurso->carpeta_recurso_id =$request->carpeta_recurso_id;

            $recurso->estado = $request->estado;
            $recurso->save();
        }


        if ($recurso) {
            return response()->json(['success' => 'RECURSO CREADO CON EXITO!']);
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
                $file->move(public_path() . '/archivos_recursos/', $name);

                $exito = Recurso::findOrFail($request->id)->update([
                    'nombre' => $request['nombre'],
                    'link' => $request['link'],
                    'ruta' => $name,
                    'carpeta_recurso_id' => $request['carpeta_recurso_id'],
                    'estado' => $request['estado']
                ]);

            } else {

                $exito = Recurso::findOrFail($request->id)->update([
                    'nombre' => $request['nombre'],
                    'link' => $request['link'],
                    'estado' => $request['estado'],
                    'carpeta_recurso_id' => $request['carpeta_recurso_id']
                ]);
            }

            if ($exito) {
                return response()->json(['success' => 'RECURSO ACTUALIZADO CORRECTAMENTE']);
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
        $recursos = Recurso::findOrFail($id);

        if ($recursos->estado == 1) {
            $recursos->update(['estado' => 2]);
        } else {
            $recursos->update(['estado' => 1]);
        }
        return response()->json(['success' => 'ESTADO DE RECURSO ACTUALIZADO CON EXITO!']);
    }

    public function eliminar($id)
    {

        $recurso = Recurso::find($id);
        $recurso->delete();
        return response()->json(['success' => 'RECURSO ELIMINADO CON EXITO!']);



    }


}
