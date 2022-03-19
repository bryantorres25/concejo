<div class="wrapper overlay-sidebar">
    <div class="main-header">
        <!-- Logo Header -->
        <div class="logo-header" style="background: #fff">

            <a href="" class="logo">
                <img src="{{ asset('img/logo.png') }}" alt="navbar brand" class="navbar-brand" width="140px">
            </a>
            <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
                data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i class="icon-menu" style="color:  #589B4E"></i>
                </span>
            </button>
            <button class="topbar-toggler more"><i class="icon-options-vertical style="color:  #589B4E"></i></button>
            <div class="nav-toggle">
                <button class="btn btn-success sidenav-overlay-toggler">
                    <i class="icon-menu" style="color:  #589B4E"></i>
                </button>
            </div>
        </div>
        <!-- End Logo Header -->

        <!-- Navbar Header -->
        <nav class="navbar navbar-header navbar-expand-lg" style="background:  #589B4E">

            <div class="container-fluid">
                <div class="collapse" id="search-nav">
                </div>
                <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                    <li class="nav-item dropdown hidden-caret">
                        @php
                            $persona=auth()->user()->persona_id;
                            $date=date('Y-m-d');

                            $votaciones=DB::table('proyecto_votaciones')->where('estado_id', '1')
                            ->where('fecha', $date)->get();
                            if(count($votaciones)>0){
                                $validar=DB::table('votaciones')->where('proyecto_id', $votaciones[0]->proyecto_id)
                            ->where('persona_id', $persona)->get();
                            $filas=count($validar);
                            $cantidad=count($votaciones);
                            }else {
                                $fila=0;
                                $cantidad=0;
                            }


                        @endphp

                        <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            @if ($cantidad>0 && $filas<=0)
                                <span class="notification">{{$cantidad}}</span>
                            @endif
                        </a>
                        <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                            <li>
                                @if ($cantidad>0 && $filas<=0)
                                    <div class="dropdown-title">Hay Votaciones Activas</div>
                                @else
                                    <div class="dropdown-title">No Hay Votaciones Pendientes</div>
                                @endif
                            </li>
                            <li>
                                <div class="notif-scroll scrollbar-outer">
                                    <div class="notif-center">
                                        <a href="{{route('votaciones.index')}}">
                                            <div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i>
                                            </div>
                                            <div class="notif-content">
                                                <span class="block">
                                                    Votaciones Activas : {{$cantidad}}
                                                </span>
                                                <span class="time"></span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    @php
                    $id=auth()->user()->id;
                    $persona=DB::table('usuarios as u')
                    ->join('personas as p','u.persona_id','=','p.id')
                    ->select('p.nombres','p.apellidos','p.foto')
                    ->where('u.id','=',$id)->get();
                @endphp
                @foreach ($persona as $item)
                    <li class="nav-item dropdown hidden-caret">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                            <div class="avatar-sm">
                                <img src="fotos/{{ $item->foto }}" alt="..." class="avatar-img rounded-circle">
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-user animated fadeIn">
                            <div class="dropdown-user-scroll scrollbar-outer">
                                <li>
                                    <div class="user-box">
                                        <div class="u-text">



                                        <h4>{{ $item->nombres.' '.$item->apellidos }}</h4>
                                        <a href="{{ route('concejalusuarios.show',auth()->user()->id) }}" class="btn btn-xs btn-success btn-sm">Mi Cuenta</a>
                                        @endforeach

                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                    <form id="logout-form" action="{{route('logout')}}" method="POST">
                                        @csrf
                                        <button type="submit" id="btn-salir" class="btn">  <i class="fa fa-window-close text-danger"></i> </i> Cerrar Sesión</button>
                                    </form>
                                </li>
                            </div>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- End Navbar -->
    </div>

    <!-- Sidebar -->
    <div class="sidebar sidebar-style-2">

        <div class="sidebar-wrapper scrollbar scrollbar-inner">
            <div class="sidebar-content">

                <ul class="nav nav-primary">
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">Opciones</h4>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('home') }}">
                            <i class="fas fa-desktop"></i>
                            <p>Inicio</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('votaciones.index') }}">
                            <i class="fas fa-newspaper"></i>
                            <p>Votaciones a Proyectos</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('votaciones-proposiciones.index') }}">
                            <i class="fas fa-newspaper"></i>
                            <p>Votaciones a proposiciones</p>
                        </a>
                    </li>
                    @php
                    $idpersona = auth()->user()->persona_id;
                         $persona = DB::table('personas as p')
                        ->join('usuarios as u', 'p.id', '=', 'u.persona_id')
                        ->select('p.cargo_id as cargo')
                        ->where('u.persona_id', '=', $idpersona)->get();
                        foreach ($persona as $p) {
                            $idcargo = $p->cargo;
                        }
                    @endphp
                    @if($idcargo==4)
                    <li class='nav-item'>
                        <a href="{{ route('derrotero-show.index') }}">
                            <i class="fas fa-key"></i>
                            <p>Derrotero</p>
                        </a>
                    </li>
                    @endif


                    <li class="nav-item">
                        <a href="{{ route('proyectosvisual.index') }}">
                            <i class="fas fa-project-diagram"></i>
                            <p>Proyectos</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('recursosvisual.index') }}">
                            <i class="fas fa-folder"></i>
                            <p>Recursos</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('orden-dia-show.index') }}">
                            <i class="fas fa-bars"></i>
                            <p>Orden del día</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('palabras.index')}}">
                            <i class="fas fa-hand-paper"></i>
                            <p>Palabra</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('elecciones.index')}}">
                            <i class="fas fa-id-card"></i>
                            <p>Dignatarios/Funcionarios</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('eleccion-comisiones-concejal.index')}}">
                            <i class="fas fa-credit-card"></i>
                            <p>Elecciones Comisiones</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
