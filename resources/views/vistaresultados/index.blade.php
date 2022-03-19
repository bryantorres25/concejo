@extends('plantilla.consejales')

@section('content')
<div class="panel-header" style="background-color: #B43437">

	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">Módulo de Resultados</h2>
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
			<h4 class="page-title">Resultados!</h4>
			<div class="row">
				<div class="col-md-4">
					<a class="stretched-link text-decoration-none nav-link " href="{{route('resultadosp.resultadosp')}}"  aria-haspopup="true" aria-expanded="false">
						<div class="card card-warning card-annoucement card-round card-pricing2 ">
							<div class="card-body text-center">
								<div class="pricing-header">
									<h2 class="fw-bold">Resultados Proyectos</h2>
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
					<a class="stretched-link text-decoration-none nav-link " href="{{ route('resultadospro.resultadospro') }}"  aria-haspopup="true" aria-expanded="false">
						<div class="card card-danger card-annoucement card-round card-pricing2 ">
							<div class="card-body text-center">
								<div class="pricing-header">
									<h2 class="fw-bold">Resultados Proposiciones</h2>
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
					<a class="stretched-link text-decoration-none nav-link " href="{{ route('resultadose.resultadose') }}"  aria-haspopup="true" aria-expanded="false">
						<div class="card card-success card-annoucement card-round card-pricing2 ">
							<div class="card-body text-center">
								<div class="pricing-header">
									<h2 class="fw-bold">Resultados Dignatarios/Funcionarios</h2>
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
					<a class="stretched-link text-decoration-none nav-link " href="{{ route('resultadoscom.resultadoscom') }}"  aria-haspopup="true" aria-expanded="false">
						<div class="card card-success card-annoucement card-round card-pricing2 ">
							<div class="card-body text-center">
								<div class="pricing-header">
									<h2 class="fw-bold">Resultados Comisiones</h2>
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

			</div>
		</div>
	</div>
</div>
@endsection
