<?php

namespace App\Http\Controllers;

use App\OrdenDia;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

class OrdenDiaController extends Controller
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
        $ordendia = OrdenDia::orderBy('fecha','desc')->get();
        $validar=count($ordendia);
        if (request()->ajax()) {
            $ordendia = ordendia::orderby('fecha','desc')->get();
            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($ordendia) == 0) {
                //return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('tablas.tb-ordendia', compact('ordendia'));
            }
        }

        return view('ordendia.index', compact('ordendia','validar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orden_dia.create');
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
                $file->move(public_path() . '/archivos_ordendia/', $name);

                $ordendia = new OrdenDia();
                $date=Carbon::now()->format('Y-m-d');

                $ordendia->fecha = $date;
                $ordendia->ruta = $name;
                $ordendia->save();
            }


            if ($ordendia) {
                return response()->json(['success' => ' ORDEN DEL DIA CREADA CON EXITO!']);
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
                $file->move(public_path() . '/archivos_ordendia/', $name);

                $exito = OrdenDia::findOrFail($request->id)->update([
                    'fecha'=>$request->fecha,
                    'ruta' => $name
                ]);

            } else{

                $exito = OrdenDia::findOrFail($request->id)->update([
                    'fecha'=>$request->fecha
                ]);
            }

            if ($exito) {
                return response()->json(['success' => 'ORDEN DIA ACTUALIZADA CORRECTAMENTE']);
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
        $obj = OrdenDia::findOrFail($id);

        if ($obj->estado == 1) {
            $obj->update(['estado' => 0]);
        } else {
            $obj->update(['estado' => 1]);
        }
        return response()->json(['success' => 'ESTADO ACTUALIZADO CON EXITO!']);
    }

    public function eliminar($id)
    {

        $orden = OrdenDia::find($id);
        $orden->delete();
        return response()->json(['success' => 'ORDEN DE DIA ELIMINADA CON EXITO!']);



    }
}
