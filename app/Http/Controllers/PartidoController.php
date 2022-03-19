<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partido;

class PartidoController extends Controller
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
        
        $partidos = Partido::all();

        if (request()->ajax()) {
            $partidos = Partido::all();
            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($partidos) == 0) {
                return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('tablas.tb-partidos', compact('partidos'));
            }
        }
        return view('partidos.index', compact('partidos'));
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
        $this->validate($request, [
            'logo' => 'required|image'
        ]);
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/logos/', $name);
        }
        $partido = new Partido();
        $partido->nombre = $request->nombre;
        $partido->logo = $name;

        $partido->save();
        $exito = $partido;
        if ($exito) {
            return response()->json(['success' => 'PARTIDO CREADO CON EXITO!']);
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

            $this->validate($request, [
                'logo' => 'image'
            ]);
            
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $name = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/logos/', $name);
                $exito = Partido::findOrFail($request->id)->update([
                    'nombre' => $request['nombre'],
                    'logo' => $name
                ]);
            } else {
                $exito = Partido::findOrFail($request->id)->update([
                    'nombre' => $request['nombre']
                ]);
            }

            if ($exito) {
                return response()->json(['success' => 'PARTIDO ACTUALIZADO CORRECTAMENTE']);
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
        $partido = Partido::findOrFail($id);

        if ($partido->estado == 1) {
            $partido->update(['estado' => 0]);
        } else {
            $partido->update(['estado' => 1]);
        }
        return response()->json(['success' => 'ESTADO DE PARTIDO ACTUALIZADO CON EXITO!']);
    }
}
