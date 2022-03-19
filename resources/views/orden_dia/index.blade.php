@extends('plantilla.secretaria')

@section('content')
    <div class="panel-header bg-danger-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">Administración</h2>
				<h5 class="text-white op-7 mb-2">Orden del Día</h5>
			</div>
							
		</div>
	</div>
    </div> 									                             
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
				<div class="card full-height">
					<div class="card-body">
                    <div class="col-md-12">
							<div class="card"><br>
								<a href="{{ route('ordenes.create') }}" class="btn btn-outline-success waves-effect waves-light" 
									>
									<i class="fa fa-plus-circle"></i> Agregar 
							</a><br>
								<div id="id_table">
									@include('tablas.tb-orden-dia')
								</div>
							</div>
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
	<script src="{{ asset('archivos_js/OrdenDia.js') }}"></script>
@endsection