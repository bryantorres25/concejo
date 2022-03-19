<?php

namespace App\Http\Controllers;

use App\Asistencia;
use App\Persona;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $idpersona = auth()->user()->persona_id;
        $fecha=Carbon::now('America/Bogota')->format('Y-m-d');
        $hora=Carbon::now()->format('h:i:s');
        $validarpersona=Asistencia::where('persona_id',$idpersona)->where('fecha',$fecha)->get();
        $validar=count($validarpersona);
        if($validar==0)
        {
            $asistencia=new Asistencia();
                $asistencia->persona_id=$idpersona;
                $asistencia->fecha=$fecha;
                $asistencia->hora=$hora;
                $asistencia->save();
        }
        $persona = DB::table('personas as p')
            ->join('usuarios as u', 'p.id', '=', 'u.persona_id')
            ->select('p.cargo_id as cargo')
            ->where('u.persona_id', '=', $idpersona)->get();



        foreach ($persona as $p) {
            $idcargo = $p->cargo;
            if ($idcargo == 1 ) {
                return view('home.index_secretaria');
            } else if ($idcargo == 2) {
                return view('home.index_secretaria');
            }else if ($idcargo ==3 ) {
                return view('home.index');
            }
            else if ($idcargo ==4 ) {
                return view('home.index');
            } else if ($idcargo ==5 ) {
                return view('home.index');
            }
            else if ($idcargo ==6 ) {
                return view('home.index');
            }
        }
    }

    public function consejal(){
        return view ('home.index');
    }
}
