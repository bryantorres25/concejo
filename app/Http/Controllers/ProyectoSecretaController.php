<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partido;
use App\Cargos;
use App\Persona;
use App\Proponente;
use App\Proyecto;
use App\ProyectoSecreta;
use App\TipoVotacion;

class ProyectoSecretaController extends Controller
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
        $proyectos = ProyectoSecreta::all();
        $personas = Persona::where('estado', 1)->get();
        $tipos = TipoVotacion::where('estado', 1)->get();       

        if (request()->ajax()) {
            $proyectos = ProyectoSecreta::all();
            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($proyectos) == 0) {
                //return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('tablas.tb-proyectos-secreta', compact('proyectos', 'tipos'));
            }
        }
        return view('proyectos-secretos.index', compact('proyectos', 'personas', 'tipos', 'proponentes'));
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


        $proyecto = new ProyectoSecreta();
        $proyecto->nombre = $request->nombre;
        $proyecto->descripcion = $request->descripcion;
        $proyecto->anexos = $request->anexos;
        $proyecto->persona_id = auth()->user()->persona_id;        
        $proyecto->ruta = $name;
        $proyecto->save();
        if ($proyecto) {
            return response()->json(['success' => 'DATOS REGISTRADOS CON EXITO!']);
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

                $exito = ProyectoSecreta::findOrFail($request->id)->update([
                    'nombre' => $request['nombre'],
                    'descripcion' => $request['descripcion'],
                    'anexos' => $request['anexos'],
                    'persona_id' => auth()->user()->persona_id,                  
                    'ruta' => $name
                ]);

            } else {

                $exito = ProyectoSecreta::findOrFail($request->id)->update([
                    'nombre' => $request['nombre'],
                    'descripcion' => $request['descripcion'],
                    'anexos' => $request['anexos'],
                    'persona_id' => auth()->user()->persona_id,                    
                ]);
            }

            if ($exito) {
                return response()->json(['success' => 'DATOS ACTUALIZADOS CORRECTAMENTE']);
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
        $proyecto = ProyectoSecreta::findOrFail($id);

        if ($proyecto->estado == 1) {
            $proyecto->update(['estado' => 0]);
        } else {
            $proyecto->update(['estado' => 1]);
        }
        return response()->json(['success' => 'ESTADO  ACTUALIZADO CON EXITO!']);
    }
    public function changevista($id)
    {
        $proyecto = ProyectoSecreta::findOrFail($id);

        if ($proyecto->estado_vista == 0) {
            $proyecto->update(['estado_vista' => 1]);
        } else {
            $proyecto->update(['estado_vista' =>0]);
        }
        return response()->json(['success' => 'VISIBILIDAD HABILITADA']);
    }
}
