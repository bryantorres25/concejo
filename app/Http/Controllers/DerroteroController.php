<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Derrotero;
use Carbon\Carbon;

class DerroteroController extends Controller
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
        $date=Carbon::now()->format('Y-m-d');
        $derrotero = Derrotero::orderBy('fecha','desc')->get();
        $validar=count($derrotero);
        if (request()->ajax()) {
            $derrotero = Derrotero::orderby('fecha','desc')->get();
            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($derrotero) == 0) {
                //return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('tablas.tb-derrotero', compact('derrotero'));
            }
        }

        return view('derrotero.index', compact('derrotero','validar'));
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
            $file->move(public_path() . '/archivos_derrotero/', $name);

            $derrotero = new Derrotero();
            $date=Carbon::now()->format('Y-m-d');

            $derrotero->fecha = $date;
            $derrotero->ruta = $name;
            $derrotero->save();
        }


        if ($derrotero) {
            return response()->json(['success' => ' DERROTERO CREADO CON EXITO!']);
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
                $file->move(public_path() . '/archivos_derrotero/', $name);

                $exito = Derrotero::findOrFail($request->id)->update([
                    'fecha'=>$request->fecha,
                    'ruta' => $name
                ]);

            } else{

                $exito = Derrotero::findOrFail($request->id)->update([
                    'fecha'=>$request->fecha

                ]);
            }

            if ($exito) {
                return response()->json(['success' => 'DERROTERO ACTUALIZADO CORRECTAMENTE']);
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
        $derrotero = Derrotero::findOrFail($id);

        if ($derrotero->estado == 1) {
            $derrotero->update(['estado' => 0]);
        } else {
            $derrotero->update(['estado' => 1]);
        }
        return response()->json(['success' => 'ESTADO DE DERROTERO ACTUALIZADO CON EXITO!']);
    }
    public function eliminar($id)
    {

        $derrotero = Derrotero::find($id);
        $derrotero->delete();
        return response()->json(['success' => 'DERROTERO ELIMINADO CON EXITO!']);



    }
}
