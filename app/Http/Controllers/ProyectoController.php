<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partido;
use App\Cargos;
use App\Comision;
use App\Persona;
use App\Proponente;
use App\Proyecto;
use App\TipoVotacion;

class ProyectoController extends Controller
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
        $proyectos = Proyecto::all();
        $personas = Persona::where('estado', 1)->get();
        $tipos = TipoVotacion::where('estado', 1)->get();
        $proponentes = Proponente::where('estado', 1)->get();
        $comisiones = Comision::all();

        if (request()->ajax()) {
            $proyectos = Proyecto::all();
            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($proyectos) == 0) {
                //return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('tablas.tb-proyectos', compact('proyectos', 'tipos'));
            }
        }
        return view('proyectos.index', compact('proyectos', 'personas', 'tipos', 'proponentes', 'comisiones'));
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
            'ruta' => 'required'
        ]);
        if ($request->hasFile('ruta')) {
            $file = $request->file('ruta');
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/archivos_pdf/', $name);
        }

        if ($request->hasFile('ponencia_uno')) {
            $file1 = $request->file('ponencia_uno');
            $name1 = time() . $file1->getClientOriginalName();
            $file1->move(public_path() . '/archivos_ponecias/', $name1);
        }
        else {
            $name1="";
        }
        if ($request->hasFile('ponencia_dos')) {

            $file2 = $request->file('ponencia_dos');
            $name2 = time() . $file2->getClientOriginalName();
            $file2->move(public_path() . '/archivos_ponecias_dos/', $name2);
        }else {
            $name2="";
        }


        $proyecto = new Proyecto();
        $proyecto->nombre = $request->nombre;
        $proyecto->descripcion = $request->descripcion;
        $proyecto->anexos = $request->anexos;
        $proyecto->persona_id = auth()->user()->persona_id;
        $proyecto->proponente_id = $request->proponente_id;
        $proyecto->ponente = $request->ponente;
        $proyecto->coponente = $request->coponente;
        $proyecto->coordinador = $request->coordinador;
        $proyecto->estado = $request->estado;
        $proyecto->comision_id = $request->comision_id;
        $proyecto->ponencia_uno = $request->ponencia_uno;
        $proyecto->ponencia_dos = $request->ponencia_dos;
        $proyecto->ruta = $name;
        $proyecto->ponencia_uno = $name1;
        $proyecto->ponencia_dos = $name2;
        $proyecto->save();
        if ($proyecto) {
            return response()->json(['success' => 'PROYECTO CREADO CON EXITO!']);
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
                $file->move(public_path() . '/archivos_pdf/', $name);

                $exito = Proyecto::findOrFail($request->id)->update([
                    'nombre' => $request['nombre'],
                    'descripcion' => $request['descripcion'],
                    'anexos' => $request['anexos'],
                    'persona_id' => auth()->user()->persona_id,
                    'proponente_id' => $request['proponente_id'],
                    'comision_id' => $request['comision_id'],
                    'ponente' => $request['ponente'],
                    'coponente' => $request['coponente'],
                    'coordinador' => $request['coordinador'],
                    'estado' => $request['estado'],
                    'ruta' => $name
                ]);
            } elseif ($request->hasFile('ponencia_uno') && $request->hasFile('ponencia_dos')) {

                $file1 = $request->file('ponencia_uno');
                $name1 = time() . $file1->getClientOriginalName();
                $file1->move(public_path() . '/archivos_ponecias/', $name1);

                $file2 = $request->file('ponencia_dos');
                $name2 = time() . $file2->getClientOriginalName();
                $file2->move(public_path() . '/archivos_ponecias_dos/', $name2);

                $exito = Proyecto::findOrFail($request->id)->update([
                    'nombre' => $request['nombre'],
                    'descripcion' => $request['descripcion'],
                    'anexos' => $request['anexos'],
                    'persona_id' => auth()->user()->persona_id,
                    'proponente_id' => $request['proponente_id'],
                    'comision_id' => $request['comision_id'],
                    'ponente' => $request['ponente'],
                    'coponente' => $request['coponente'],
                    'coordinador' => $request['coordinador'],
                    'estado' => $request['estado'],
                    'ponencia_uno' => $name1,

                    'ponencia_dos' => $name2
                ]);
            }elseif ($request->hasFile('ponencia_uno')) {

                $file1 = $request->file('ponencia_uno');
                $name1 = time() . $file1->getClientOriginalName();
                $file1->move(public_path() . '/archivos_ponecias/', $name1);

                $exito = Proyecto::findOrFail($request->id)->update([
                    'nombre' => $request['nombre'],
                    'descripcion' => $request['descripcion'],
                    'anexos' => $request['anexos'],
                    'persona_id' => auth()->user()->persona_id,
                    'proponente_id' => $request['proponente_id'],
                    'comision_id' => $request['comision_id'],
                    'ponente' => $request['ponente'],
                    'coponente' => $request['coponente'],
                    'coordinador' => $request['coordinador'],
                    'estado' => $request['estado'],
                    'ponencia_uno' => $name1
                ]);
            } elseif ($request->hasFile('ponencia_dos')) {

                $file2 = $request->file('ponencia_dos');
                $name2 = time() . $file2->getClientOriginalName();
                $file2->move(public_path() . '/archivos_ponecias_dos/', $name2);

                $exito = Proyecto::findOrFail($request->id)->update([
                    'nombre' => $request['nombre'],
                    'descripcion' => $request['descripcion'],
                    'anexos' => $request['anexos'],
                    'persona_id' => auth()->user()->persona_id,
                    'proponente_id' => $request['proponente_id'],
                    'comision_id' => $request['comision_id'],
                    'ponente' => $request['ponente'],
                    'coponente' => $request['coponente'],
                    'coordinador' => $request['coordinador'],
                    'estado' => $request['estado'],
                    'ponencia_dos' => $name2
                ]);
            }  else {
                $exito = Proyecto::findOrFail($request->id)->update([
                    'nombre' => $request['nombre'],
                    'descripcion' => $request['descripcion'],
                    'anexos' => $request['anexos'],
                    'persona_id' => auth()->user()->persona_id,
                    'proponente_id' => $request['proponente_id'],
                    'comision_id' => $request['comision_id'],
                    'ponente' => $request['ponente'],
                    'coponente' => $request['coponente'],
                    'coordinador' => $request['coordinador'],
                    'estado' => $request['estado']
                ]);
            }

            if ($exito) {
                return response()->json(['success' => 'PROYECTO ACTUALIZADO CORRECTAMENTE']);
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
        $proyecto = Proyecto::findOrFail($id);

        if ($proyecto->estado == 1) {
            $proyecto->update(['estado' => 0]);
        } else {
            $proyecto->update(['estado' => 1]);
        }
        return response()->json(['success' => 'ESTADO DE PROYECTO ACTUALIZADO CON EXITO!']);
    }
    public function changevista($id)
    {
        $proyecto = Proyecto::findOrFail($id);

        if ($proyecto->estado_vista == 0) {
            $proyecto->update(['estado_vista' => 1]);
        } else {
            $proyecto->update(['estado_vista' => 0]);
        }
        return response()->json(['success' => 'VISIBILIDAD DE PROYECTO ACTUALIZADO CON EXITO!']);
    }

    public function eliminar($id)
    {

        $proyecto = Proyecto::find($id);
        $proyecto->delete();
        return response()->json(['success' => 'PROYECTO ELIMINADO CON EXITO!']);
    }
}
