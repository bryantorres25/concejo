<?php

namespace App\Http\Controllers;

use App\Aspirante;
use App\AspiranteGrupal;
use App\CarpetasRecursos;
use App\Comision;
use App\DetallePlancha;
use App\Persona;
use App\Plancha;
use Illuminate\Http\Request;

use App\TipoEleccion;
use App\TipoEleccionSocial;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class EleccionComisionController extends Controller
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
        $planchas = DB::table('plancha as p')
        ->join('personas as per','per.id','=','p.postulante_id')
        ->select('p.nombre','per.nombres','per.apellidos','p.fecha','p.estado','p.id')
        ->get();

        if (request()->ajax()) {
            $planchas = DB::table('plancha as p')
            ->join('personas as per','per.id','=','p.postulante_id')
            ->select('p.nombre','per.nombres','per.apellidos','p.fecha','p.estado','p.id')
            ->get();

            /*si los campos estan vacios mostrar mj de error, sino retornar vista. */
            if (count($planchas) == 0) {
                //return response()->json(['warning' => 'Error en el servidor']);
            } else {
                return response()->view('tablas.tb-eleccion-comisiones', compact('planchas'));
            }
        }
        return view('eleccion-comisiones.index',compact('planchas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comisiones=Comision::where('id','!=',7)->get();
        $personas=Persona::where('cargo_id','!=',1)->
        where('cargo_id','!=',2)->get();
        return view('eleccion-comisiones.create',compact('comisiones','personas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
			DB::beginTransaction();
			$plancha=new Plancha();
            $plancha->nombre=$request->nombre;
            $plancha->fecha=$request->fecha;
            $plancha->postulante_id=$request->postulante_id;
			$plancha->save();

			$comision_id=$request->get('comision_id');
			$persona_id=$request->get('persona_id');

			$cont = 0;

			while ($cont < count($comision_id)) {
				$detalle=new DetallePlancha();
				$detalle->plancha_id=$plancha->id;
				$detalle->comision_id=$comision_id[$cont];
				$detalle->persona_id=$persona_id[$cont];
                $detalle->save();



				$cont=$cont+1;
			}

            DB::commit();
            return response()->json(['success' => 'PLANCHA REGISTRADA CON EXITO']);
		} catch (Exception $e) {
			DB::rollback();
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
        $plancha = Plancha::findOrFail($id);

        if ($plancha->estado == 1) {
            $plancha->update(['estado' => 0]);
        } else {
            $plancha->update(['estado' => 1]);
        }
        return response()->json(['success' => 'ESTADO ACTUALIZADO CON EXITO!']);
    }

    public function eliminar($id)
    {

        $detallesplancha = DetallePlancha::where('plancha_id',$id)->get();

        foreach($detallesplancha as $detalles){
            $detalles->delete();
            if ($detalles) {
                $plancha = Plancha::find($id);
                $plancha->delete();
                if ($plancha) {
                    return response()->json(['success' => 'PLANCHA ELIMINADA CON EXITO']);
                }else {
                    return response()->json(['warning' => 'ERROR AL ELIMINAR']);
                }
            }
        }






    }

}
