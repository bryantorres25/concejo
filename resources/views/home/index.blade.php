@extends('plantilla.consejales')

@section('content')
<div class="panel-header" style="background-color: #B43437">

	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">Módulo de Concejo</h2>
			</div>

		</div>
		<div class="d-flex align-items-right align-items-md-center flex-column flex-md-row">
			<a href="{{route('home')}}" class="btn btn-warning">Regresar</a>
			</div>
	</div>
</div>
<div class="page-inner mt--5">
	<div class="card  card-round">
		<div class="card-body ">
			<!-- Card -->
			<h4 class="page-title">Bienvenido!</h4>
			<div class="row">
				<div class="col-md-4">
					<a class="stretched-link text-decoration-none nav-link " href="{{route('proyectosvisual.index')}}"  aria-haspopup="true" aria-expanded="false">
						<div class="card card-warning card-annoucement card-round card-pricing2 ">
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
					<a class="stretched-link text-decoration-none nav-link " href="{{ route('orden-dia-show.index') }}"  aria-haspopup="true" aria-expanded="false">
						<div class="card card-danger card-annoucement card-round card-pricing2 ">
							<div class="card-body text-center">
								<div class="pricing-header">
									<h2 class="fw-bold">Orden del Día</h2>
									<span class="sub-title"></span>
								</div>
								<div class="price-value">
									<div class="value">
									<img src="{{asset('img/orden.png')}}" alt="" width="72px">
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
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
				<div class="col-md-4">
					<a class="stretched-link text-decoration-none nav-link " href="{{ route('derrotero-show.index') }}"  aria-haspopup="true" aria-expanded="false">
						<div class="card card-success card-annoucement card-round card-pricing2 ">
							<div class="card-body text-center">
								<div class="pricing-header">
									<h2 class="fw-bold">Derrotero</h2>
									<span class="sub-title"></span>
								</div>
								<div class="price-value">
									<div class="value">
									<img src="{{asset('img/archivos.png')}}" alt="" width="72px">
									</div>
								</div>
							</div>
						</div>
					</a>
                </div>
				@endif
                <div class="col-md-4">
					<a class="stretched-link text-decoration-none nav-link " href="{{ route('palabras.index') }}"  aria-haspopup="true" aria-expanded="false">
						<div class="card card-success card-annoucement card-round card-pricing2 ">
							<div class="card-body text-center">
								<div class="pricing-header">
									<h2 class="fw-bold">Pedir Palabra</h2>
									<span class="sub-title"></span>
								</div>
								<div class="price-value">
									<div class="value">
									<img src="{{asset('img/mano.png')}}" alt="" width="72px">
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-4">
					<a class="stretched-link text-decoration-none nav-link " href="{{ route('votaciones.index') }}"  aria-haspopup="true" aria-expanded="false">
						<div class="card card-success card-annoucement card-round card-pricing2 ">
							<div class="card-body text-center">
								<div class="pricing-header">
									<h2 class="fw-bold">Votaciones a proyectos</h2>
									<span class="sub-title"></span>
								</div>
								<div class="price-value">
									<div class="value">
									<img src="{{asset('img/voto1.png')}}" alt="" width="72px">
									</div>
								</div>
							</div>
						</div>
					</a>
                </div>
                <div class="col-md-4">
					<a class="stretched-link text-decoration-none nav-link " href="{{ route('elecciones.index') }}"  aria-haspopup="true" aria-expanded="false">
						<div class="card card-warning card-annoucement card-round card-pricing2 ">
							<div class="card-body text-center">
								<div class="pricing-header">
									<h2 class="fw-bold">Elecciones Dignatarios/Funcionarios</h2>
									<span class="sub-title"></span>
								</div>
								<div class="price-value">
									<div class="value">
									<img src="{{asset('img/voto2.png')}}" alt="" width="72px">
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
                <div class="col-md-4">
					<a class="stretched-link text-decoration-none nav-link " href="{{ route('eleccion-comisiones-concejal.index') }}"  aria-haspopup="true" aria-expanded="false">
						<div class="card card-danger card-annoucement card-round card-pricing2 ">
							<div class="card-body text-center">
								<div class="pricing-header">
									<h2 class="fw-bold">Elecciones de Comisiones</h2>
									<span class="sub-title"></span>
								</div>
								<div class="price-value">
									<div class="value">
									<img src="{{asset('img/voto4.png')}}" alt="" width="72px">
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>

				<div class="col-md-4">
					<a class="stretched-link text-decoration-none nav-link " href="{{ route('recursosvisual.index') }}"  aria-haspopup="true" aria-expanded="false">
						<div class="card card-success card-annoucement card-round card-pricing2 ">
							<div class="card-body text-center">
								<div class="pricing-header">
									<h2 class="fw-bold">Recursos</h2>
									<span class="sub-title"></span>
								</div>
								<div class="price-value">
									<div class="value">
									<img src="{{asset('img/recursos.png')}}" alt="" width="72px">
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
				<div class="col-md-4">
					<a class="stretched-link text-decoration-none nav-link " href="{{ route('proposiciones.index') }}"  aria-haspopup="true" aria-expanded="false">
						<div class="card card-danger card-annoucement card-round card-pricing2 ">
							<div class="card-body text-center">
								<div class="pricing-header">
									<h2 class="fw-bold">Proposiciones</h2>
									<span class="sub-title"></span>
								</div>
								<div class="price-value">
									<div class="value">
									<img src="{{asset('img/proposicion.png')}}" alt="" width="72px">
									</div>
								</div>
							</div>
						</div>
					</a>
                </div>
                <div class="col-md-4">
					<a class="stretched-link text-decoration-none nav-link " href="{{ route('votaciones-proposiciones.index') }}"  aria-haspopup="true" aria-expanded="false">
						<div class="card card-success card-annoucement card-round card-pricing2 ">
							<div class="card-body text-center">
								<div class="pricing-header">
									<h2 class="fw-bold">Votación a Proposiciones</h2>
									<span class="sub-title"></span>
								</div>
								<div class="price-value">
									<div class="value">
									<img src="{{asset('img/voto5.png')}}" alt="" width="72px">
									</div>
								</div>
							</div>
						</div>
					</a>
                </div>
                <div class="col-md-4">
					<a class="stretched-link text-decoration-none nav-link " href="{{ route('vista-resultados.index') }}"  aria-haspopup="true" aria-expanded="false">
						<div class="card card-danger card-annoucement card-round card-pricing2 ">
							<div class="card-body text-center">
								<div class="pricing-header">
									<h2 class="fw-bold">Resultados</h2>
									<span class="sub-title"></span>
								</div>
								<div class="price-value">
									<div class="value">
									<img src="{{asset('img/estadisticas.png')}}" alt="" width="72px">
									</div>
								</div>
							</div>
						</div>
					</a>
                </div>
                <div class="col-md-4">
					<a class="stretched-link text-decoration-none nav-link " href="{{ route('planchas.index') }}"  aria-haspopup="true" aria-expanded="false">
						<div class="card card-success card-annoucement card-round card-pricing2 ">
							<div class="card-body text-center">
								<div class="pricing-header">
									<h2 class="fw-bold">Planchas</h2>
									<span class="sub-title"></span>
								</div>
								<div class="price-value">
									<div class="value">
									<img src="{{asset('img/planchas.png')}}" alt="" width="72px">
									</div>
								</div>
							</div>
						</div>
					</a>
                </div>
                <div class="col-md-4">
					<a class="stretched-link text-decoration-none nav-link " href="{{ route('hojas-vida.index') }}"  aria-haspopup="true" aria-expanded="false">
						<div class="card card-danger card-annoucement card-round card-pricing2 ">
							<div class="card-body text-center">
								<div class="pricing-header">
									<h2 class="fw-bold">Hojas de Vida</h2>
									<span class="sub-title"></span>
								</div>
								<div class="price-value">
									<div class="value">
									<img src="{{asset('img/hojas.png')}}" alt="" width="72px">
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>

				<div class="col-md-4">
					<a class="stretched-link text-decoration-none nav-link " href="{{ route('concejalusuarios.show',auth()->user()->id) }}"  aria-haspopup="true" aria-expanded="false">
						<div class="card card-warning card-annoucement card-round card-pricing2 ">
							<div class="card-body text-center">
								<div class="pricing-header">
									<h2 class="fw-bold">Cambiar Contraseña</h2>
									<span class="sub-title"></span>
								</div>
								<div class="price-value">
									<div class="value">
									<img src="{{asset('img/contrasena.png')}}" alt="" width="72px">
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
@endsection
