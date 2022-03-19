@extends('plantilla.consejales')

@section('content')
<div class="panel-header" style="background-color: #B43437">

    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">Administración</h2>
				<h5 class="text-white op-7 mb-2">Derrotero</h5>
			</div>

		</div>
		<div class="d-flex align-items-right align-items-md-center flex-column flex-md-row">
			<a href="{{route('home')}}" class="btn btn-warning">Regresar</a>
			</div>
	</div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
				<div class="card full-height">
					<div class="card-body">							
						@if ($validar>0)
						<div class="row">
							@foreach ($derrotero as $item)
								<div class="col-sm-6 col-md-3">
									<a class="stretched-link text-decoration-none nav-link " href="archivos_derrotero/{{ $item->ruta }}" target="_blank"  aria-haspopup="true" aria-expanded="false">
										<div class="card card-stats card-round">
											<div class="card-body ">
												<div class="row">
													<div class="col-5">
														<img src="{{asset('img/pdf.png')}}" alt="">
													</div>
													<div class="col-7 col-stats">
														<div class="numbers">
															<p class="card-title">Derrotero del día:</p>
															<p class="card-title"><h2 class="text-danger">{{ $item->fecha }}</h2></p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</a>
								</div>
							@endforeach   
						</div>
					@else
						<h2 class="text-danger" style="align-items: center">No hay archivos para visualizar</h2>
					@endif
							
						
                    </div>
                </div>
            </div>
        </div>
    </div>
	@endsection

	@section('scripts')
	<script>

	</script>
@endsection
