<?php

namespace App\Http\Controllers;

use App\Aspirante;
use App\AspiranteGrupal;
use App\CarpetasRecursos;
use Illuminate\Http\Request;

use App\TipoEleccion;
use App\TipoEleccionSocial;

class AspiranteGrupalController extends Controller
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
        $aspirantesgrupal = AspiranteGrupal::all();
        
        $tipoeleccionesgrupal = TipoEleccionSocial::where('estado_vista', 1)->get();

        if (request()->ajax()) {
            $aspirantesgrupal = AspiranteGrupal::all();
            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($aspirantesgrupal) == 0) {
                //return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('tablas.tb-aspirantes_grupales', compact('aspirantesgrupal'));
            }
        }
        return view('aspirantes_grupales.index', compact('aspirantesgrupal','tipoeleccionesgrupal'));
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
                $file->move(public_path() . '/hojas_vida_grupal/', $name);

                $file1 = $request->file('foto');
                $name1 = time() . $file1->getClientOriginalName();
                $file1->move(public_path() . '/fotos_aspirantes_grupal/', $name1);    

                $aspirantegrupal = new AspiranteGrupal();
                $aspirantegrupal->nombres = $request->nombres;
                $aspirantegrupal->apellidos = $request->apellidos;
                $aspirantegrupal->direccion = $request->direccion;
                $aspirantegrupal->telefono = $request->telefono;
                $aspirantegrupal->documento = $request->documento;
                $aspirantegrupal->hoja_vida = $name;
                $aspirantegrupal->foto = $name1;
                $aspirantegrupal->eleccionsocial_id =$request->eleccionsocial_id;
                $aspirantegrupal->save();

            } else {

                $aspirantegrupal = new AspiranteGrupal();
                $aspirantegrupal->nombres = $request->nombres;
                $aspirantegrupal->apellidos = $request->apellidos;
                $aspirantegrupal->direccion = $request->direccion;
                $aspirantegrupal->telefono = $request->telefono;
                $aspirantegrupal->documento = $request->documento;
                $aspirantegrupal->eleccionsocial_id =$request->eleccionsocial_id;
                $aspirantegrupal->save();
            }


            if ($aspirantegrupal) {
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
                $file->move(public_path() . '/hojas_vida_grupal/', $name);

                $file1 = $request->file('foto');
                $name1 = time() . $file1->getClientOriginalName();
                $file1->move(public_path() . '/fotos_aspirantes_grupal/', $name1);  

                $exito = AspiranteGrupal::findOrFail($request->id)->update([
                    'nombres' => $request['nombres'],
                    'apellidos' => $request['apellidos'],
                    'telefono' => $request['telefono'],
                    'direccion' => $request['direccion'],
                    'documento' => $request['documento'],
                    'hoja_vida' => $name,
                    'foto' => $name1,
                    'eleccionsocial_id' => $request['eleccionsocial_id']
                ]);

            } else {
               
                $exito = AspiranteGrupal::findOrFail($request->id)->update([
                    'nombres' => $request['nombres'],
                    'apellidos' => $request['apellidos'],
                    'telefono' => $request['telefono'],
                    'direccion' => $request['direccion'],
                    'documento' => $request['documento'],
                    'eleccionsocial_id' => $request['eleccionsocial_id']
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
        $aspirantesgrupal = AspiranteGrupal::findOrFail($id);

        if ($aspirantesgrupal->estado == 1) {
            $aspirantesgrupal->update(['estado' => 0]);
        } else {
            $aspirantesgrupal->update(['estado' => 1]);
        }
        return response()->json(['success' => 'ESTADO DE ASPIRANTE ACTUALIZADO CON EXITO!']);
    }

}
