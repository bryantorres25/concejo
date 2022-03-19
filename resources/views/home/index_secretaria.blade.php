@extends('plantilla.secretaria')

@section('content')
    <div class="panel-header" style="background-color: #B43437">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">Módulo de Secretaria</h2>
				<h5 class="text-white op-7 mb-2"></h5>
			</div>
		</div>
	</div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
				<div class="card full-height">
					<div class="card-body">
                        <!-- Card -->
                        <div class="row">
                            <div class="col-md-4">
                                <a class="stretched-link text-decoration-none nav-link " href="{{ route('asistencias.index') }}"  aria-haspopup="true" aria-expanded="false">
                                    <div class="card card-warning card-annoucement card-round card-pricing2 ">
                                        <div class="card-body text-center">
                                            <div class="pricing-header">
                                                <h2 class="fw-bold">Asistencias</h2>
                                                <span class="sub-title"></span>
                                            </div>
                                            <div class="price-value">
                                                <div class="value">
                                                <img src="{{asset('img/asistencia.png')}}" alt="" width="72px">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-4">
                                <a class="stretched-link text-decoration-none nav-link " href="{{route('proyectos.index')}}"  aria-haspopup="true" aria-expanded="false">
                                    <div class="card card-success card-annoucement card-round card-pricing2 ">
                                        <div class="card-body text-center">
                                            <div class="pricing-header">
                                                <h2 class="fw-bold">Proyectos</h2>
                                                <span class="sub-title"></span>
                                            </div>
                                            <div class="price-value">
                                                <div class="value">
                                                <img src="{{asset('img/proyecto.png')}}" alt="" width="72px">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-4">
                                <a class="stretched-link text-decoration-none nav-link " href="{{ route('ordendia.index') }}"  aria-haspopup="true" aria-expanded="false">
                                    <div class="card card-danger card-annoucement card-round card-pricing2 ">
                                        <div class="card-body text-center">
                                            <div class="pricing-header">
                                                <h2 class="fw-bold">Orden del Día</h2>
                                                <span class="sub-title"></span>
                                            </div>
                                            <div class="price-value">
                                                <div class="value">
                                                <img src="{{asset('img/1.png')}}" alt="" width="72px">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
