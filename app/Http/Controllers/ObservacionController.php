<?php

namespace App\Http\Controllers;

use App\Proyecto;
use App\ProyectoVotacion;
use App\Votacion;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ObservacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()

    {
       $proyectos=Proyecto::where('estado', '1')->get();
       return view('observaciones.index', compact('proyectos'));
    }


}
