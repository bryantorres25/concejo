<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partido;
use App\Cargos;
use App\Persona;
use App\usuarios;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('auth');
    }
    public function index()
    {
        $personas = Persona::all();
        $cargos = Cargos::where('estado', 1)->get();
        $partidos = Partido::where('estado', 1)->get();

        if (request()->ajax()) {
            $personas = Persona::all();
            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($personas) == 0) {
                return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('tablas.tb-personasusuarios', compact('personas'));
            }
        }
        return view('usuarios.index', compact('personas', 'cargos', 'partidos'));
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
        $validar = usuarios::where('persona_id', $request->id)->get();
        if (count($validar) > 0) {
            return response()->json(['warning' => 'LA PERSONA SELECCIONADA YA TIENE UN USUARIO ASIGNADO']);
        } else {
            $password1 = $request->password1;
            $password2 = $request->password2;
            if ($password1 != $password2) {
                return response()->json(['warning' => 'LAS CONTRASEÑAS NO COINCIDEN!']);
            } else {
                $user = new usuarios();
                $user->email = $request->documento;
                $user->password = bcrypt($request->password1);
                $user->persona_id = $request->id;
                $user->save();

                if ($user) {
                    return response()->json(['success' => 'USUARIO ASIGNADO CON EXITO!']);
                }
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
    public function update(Request $request,$id)
    {
        $validar = usuarios::where('persona_id', $request->id)->get();
        
        if (count($validar) == 0) {
            return response()->json(['warning' => 'LA PERSONA SELECCIONADA NO TIENE UN USUARIO ASIGNADO']);
        } else {
            $password1 = $request->password1;
            $password2 = $request->password2;
            if ($password1 != $password2) {
                return response()->json(['warning' => 'LAS CONTRASEÑAS NO COINCIDEN!']);
            } else {
               $password= bcrypt($request->password1);
                $idusuario = usuarios::where('persona_id', $request->id)->select('id')->get();
                foreach  ($idusuario as $idu){
                   $iduser= $idu->id;
                }
                $user= usuarios::findOrFail($iduser);
                $user->update(['password' => $password]);
                                 
                if ($user) {
                    return response()->json(['success' => 'CONTRASEÑA ACTUALIZADA CON EXITO!']);
                }
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

        if ($persona->estado == 1) {
            $persona->update(['estado' => 0]);
        } else {
            $persona->update(['estado' => 1]);
        }
        return response()->json(['success' => 'ESTADO DE PERSONA ACTUALIZADO CON EXITO!']);
    }
}
