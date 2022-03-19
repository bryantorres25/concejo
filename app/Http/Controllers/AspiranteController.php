<?php

namespace App\Http\Controllers;

use App\Aspirante;
use App\CarpetasRecursos;
use Illuminate\Http\Request;

use App\TipoEleccion;



class AspiranteController extends Controller
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
        $aspirantes = Aspirante::all();

        $tipoelecciones = TipoEleccion::where('estado_vista', 1)->get();

        if (request()->ajax()) {
            $aspirantes = Aspirante::all();
            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($aspirantes) == 0) {
                //return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('tablas.tb-aspirantes', compact('aspirantes'));
            }
        }
        return view('aspirantes.index', compact('aspirantes', 'tipoelecciones'));
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
                $file->move(public_path() . '/hojas_vida/', $name);

                $file1 = $request->file('foto');
                $name1 = time() . $file1->getClientOriginalName();
                $file1->move(public_path() . '/fotos_aspirantes/', $name1);

                $aspirante = new Aspirante();
                $aspirante->nombres = $request->nombres;
                $aspirante->apellidos = $request->apellidos;
                $aspirante->direccion = $request->direccion;
                $aspirante->telefono = $request->telefono;
                $aspirante->documento = $request->documento;
                $aspirante->hoja_vida = $name;
                $aspirante->foto = $name1;
                $aspirante->tipoeleccion_id = $request->tipoeleccion_id;
                $aspirante->save();
            } else {

                $aspirante = new Aspirante();
                $aspirante->nombres = $request->nombres;
                $aspirante->apellidos = $request->apellidos;
                $aspirante->direccion = $request->direccion;
                $aspirante->telefono = $request->telefono;
                $aspirante->documento = $request->documento;
                $aspirante->tipoeleccion_id = $request->tipoeleccion_id;
                $aspirante->save();
            }


            if ($aspirante) {
                return response()->json(['success' => 'ASPIRANTE CREADO CON EXITO!']);
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
                $file->move(public_path() . '/hojas_vida/', $name);


                $exito = Aspirante::findOrFail($request->id)->update([
                    'nombres' => $request['nombres'],
                    'apellidos' => $request['apellidos'],
                    'telefono' => $request['telefono'],
                    'direccion' => $request['direccion'],
                    'documento' => $request['documento'],
                    'hoja_vida' => $name,
                    'tipoeleccion_id' => $request['tipoeleccion_id']
                ]);
            } elseif ($request->hasFile('foto')) {
                # code...
                $file1 = $request->file('foto');
                $name1 = time() . $file1->getClientOriginalName();
                $file1->move(public_path() . '/fotos_aspirantes/', $name1);

                $exito = Aspirante::findOrFail($request->id)->update([
                    'nombres' => $request['nombres'],
                    'apellidos' => $request['apellidos'],
                    'telefono' => $request['telefono'],
                    'direccion' => $request['direccion'],
                    'documento' => $request['documento'],
                    'foto' => $name1,
                    'tipoeleccion_id' => $request['tipoeleccion_id']
                ]);
            } elseif ($request->hasFile('foto') && $request->hasFile('ruta')) {

                $file = $request->file('ruta');
                $name = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/hojas_vida/', $name);

                $file1 = $request->file('foto');
                $name1 = time() . $file1->getClientOriginalName();
                $file1->move(public_path() . '/fotos_aspirantes/', $name1);

                $exito = Aspirante::findOrFail($request->id)->update([
                    'nombres' => $request['nombres'],
                    'apellidos' => $request['apellidos'],
                    'telefono' => $request['telefono'],
                    'direccion' => $request['direccion'],
                    'documento' => $request['documento'],
                    'hoja_vida' => $name,
                    'foto' => $name1,
                    'foto' => $name1,
                    'tipoeleccion_id' => $request['tipoeleccion_id']
                ]);
            } else {
                $exito = Aspirante::findOrFail($request->id)->update([
                    'nombres' => $request['nombres'],
                    'apellidos' => $request['apellidos'],
                    'telefono' => $request['telefono'],
                    'direccion' => $request['direccion'],
                    'documento' => $request['documento'],
                    'tipoeleccion_id' => $request['tipoeleccion_id']
                ]);
            }

            if ($exito) {
                return response()->json(['success' => 'ASPIRANTE ACTUALIZADO CORRECTAMENTE']);
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
        $aspirantes = Aspirante::findOrFail($id);

        if ($aspirantes->estado == 1) {
            $aspirantes->update(['estado' => 0]);
        } else {
            $aspirantes->update(['estado' => 1]);
        }
        return response()->json(['success' => 'ESTADO DE ASPIRANTE ACTUALIZADO CON EXITO!']);
    }
}
