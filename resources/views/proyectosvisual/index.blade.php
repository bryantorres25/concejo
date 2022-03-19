@extends('plantilla.consejales')

@section('content')
<div class="panel-header" style="background-color: #B43437">

    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">Administración</h2>
				<h5 class="text-white op-7 mb-2">Proyectos</h5>
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
                   
							
								<div id="id_table">
									@include('tablas.proyectosvisualizacion')
								</div>
							
						
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
