<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partido;
use App\Cargos;
use App\Comision;
use App\Persona;

class PersonaController extends Controller
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
        $personas=Persona::all();
        $cargos=Cargos::where('estado', 1)->get();
        $partidos=Partido::where('estado', 1)->get();
        $comisiones=Comision::where('estado',1)->get();

        if (request()->ajax()) {
            $personas = Persona::all();
            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($personas) == 0) {
                return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('tablas.tb-personas', compact('personas'));
            }
        }
        return view('personas.index', compact('personas', 'cargos', 'partidos','comisiones'));

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
            'foto' => 'required|image'
        ]);
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/fotos/', $name);
        }
        $persona = new Persona();
        $persona->nombres = $request->nombres;
        $persona->apellidos = $request->apellidos;
        $persona->fecha_nac = $request->fecha_nac;
        $persona->documento = $request->documento;
        $persona->genero = $request->genero;
        $persona->telefono = $request->telefono;
        $persona->direccion = $request->direccion;
        $persona->cargo_id = $request->cargo_id;
        $persona->correo = $request->correo;
        $persona->partido_id = $request->partido_id;
        $persona->comision_id = $request->comision_id;
        $persona->foto = $name;
        $persona->save();
        $exito = $persona;
        if($exito){
            return response()->json(['success' => 'PERSONA CREADA CON EXITO!']);
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
                'foto' => 'image'
            ]);
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $name = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/fotos/', $name);

                $exito = Persona::findOrFail($request->id)->update([
                    'nombres' => $request['nombres'],
                    'apellidos' => $request['apellidos'],
                    'fecha_nac'=>$request['fecha_nac'],
                    'documento' => $request['documento'],
                    'genero' => $request['genero'],
                    'telefono' => $request['telefono'],
                    'direccion' => $request['direccion'],
                    'correo' => $request['correo'],
                    'cargo_id' => $request['cargo_id'],
                    'cargo_id' => $request['cargo_id'],
                    'comision_id' => $request['comision_id'],
                    'foto' => $name
                ]);
            } else {
                $exito = Persona::findOrFail($request->id)->update([
                    'nombres' => $request['nombres'],
                    'apellidos' => $request['apellidos'],
                    'fecha_nac'=>$request['fecha_nac'],
                    'documento' => $request['documento'],
                    'genero' => $request['genero'],
                    'telefono' => $request['telefono'],
                    'direccion' => $request['direccion'],
                    'correo' => $request['correo'],
                    'cargo_id' => $request['cargo_id'],
                    'comision_id' => $request['comision_id'],
                    'partido_id' => $request['partido_id']
                ]);
            }

            if($exito){
                return response()->json(['success' => 'PERSONA ACTUALIZADA CORRECTAMENTE']);
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
        $persona = Persona::findOrFail($id);

        if ($persona->estado==1) {
            $persona->update(['estado' => 0]);
        } else {
            $persona->update(['estado' => 1]);
        }
        return response()->json(['success' => 'ESTADO DE PERSONA ACTUALIZADO CON EXITO!']);
    }
}
