<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comision;
use App\Palabra;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PalabraController  extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {

        $this->middleware('auth');
    }


    public function index()
    {
        return view('palabras.index');
    }


    public function filtro(Request $request)
    {
        if (request()->ajax()) {
            $fecha = Carbon::now()->format('Y-m-d');
            Palabra::create([
                'persona_id' => $request->persona_id,
                'fecha' => $fecha
            ]);

            $palabras = DB::table('personas as p')
                ->join('palabras as pa', 'p.id', '=', 'pa.persona_id')
                ->join('partidos as par', 'p.partido_id', '=', 'par.id')
                ->select('p.nombres', 'p.apellidos', 'p.foto', 'par.logo','p.id as idp','pa.id','pa.estado','pa.persona_id')
                ->where('pa.fecha', $fecha)
                ->where('pa.estado',1)
                ->get();
            $cantidad = count($palabras);
            return response()->view('ajax.palabras', compact('palabras', 'cantidad'));
        }
    }

    public function filtrolistado(Request $request)
    {
        if (request()->ajax()) {
            $fecha = Carbon::now()->format('Y-m-d');
            $palabras = DB::table('personas as p')
                ->join('palabras as pa', 'p.id', '=', 'pa.persona_id')
                ->join('partidos as par', 'p.partido_id', '=', 'par.id')
                ->select('p.nombres', 'p.apellidos', 'p.foto', 'par.logo','p.id as idp','pa.id','pa.estado','pa.persona_id')
                ->where('pa.fecha', $fecha)
                ->where('pa.estado',1)
                ->get();
            $cantidad = count($palabras);
            return response()->view('ajax.palabras', compact('palabras', 'cantidad'));
        }
    }

    public function cancelar(Request $request)
    {
        if (request()->ajax()) {
            $fecha = Carbon::now()->format('Y-m-d');
            $palabra = Palabra::find($request->persona_id);

            $palabra->estado=0;
            $palabra->save();

            $palabras = DB::table('personas as p')
                ->join('palabras as pa', 'p.id', '=', 'pa.persona_id')
                ->join('partidos as par', 'p.partido_id', '=', 'par.id')
                ->select('p.nombres', 'p.apellidos', 'p.foto', 'par.logo','p.id as idp','pa.id','pa.estado')
                ->where('pa.fecha', $fecha)
                ->where('pa.estado',1)
                ->get();
            $cantidad = count($palabras);
            return response()->view('ajax.palabras', compact('palabras', 'cantidad'));
        }
    }

    public function eliminar($id)
    {
        $palabras = Palabra::find($id);
        $palabras->delete();
        return response()->json(['success' => 'PALABRA CANCELADA CON EXITO!']);
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }


    public function change($id)
    {
        $palabras = Palabra::findOrFail($id);

        if ($palabras->estado == 1) {
            $palabras->update(['estado' => 0]);
            return view('palabras.index');
        } else {
            $palabras->update(['estado' => 1]);
        }

    }
}
