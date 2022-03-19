<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partido;
use App\Cargos;
use App\Persona;
use App\usuarios;
use Illuminate\Support\Facades\DB;

class ConcejalUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
       
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $usuarios=DB::table('usuarios as u')
        ->join('personas as p', 'p.id','=','u.persona_id')
        ->select('p.nombres','p.apellidos','u.id','u.persona_id')
        ->where('u.id',$id)
        ->get();
        return view('concejalusuarios.show',compact('usuarios'));
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
        
        if (request()->ajax()) {
            $this->validate($request, [
                'password1' => 'required|numeric',
                'password2' => 'required|numeric'
            ]);
            $password1 = $request->password1;
            $password2 = $request->password2;
            if ($password1 != $password2) {
                return response()->json(['warning' => 'LAS CONTRASEÑAS NO COINCIDEN!']);
            } else {
               $password= bcrypt($request->password1);
                $user= usuarios::findOrFail($request->id);
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
        
    }
}
