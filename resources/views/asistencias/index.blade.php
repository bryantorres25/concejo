@extends('plantilla.secretaria')

@section('content')
<div class="panel-header" style="background-color: #B43437">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">Administración</h2>
				<h5 class="text-white op-7 mb-2">Asistencias</h5>
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
								<form id="form_filtro" action="{{ route('asistencia.filtro') }}" class="form-inline" >
									<div class="form-group ">
										<label>Fecha</label>
										<input type="date" name="fecha" id="fecha" class="form-control" required value="@php
											echo date('Y-m-d')
										@endphp"/ >
									</div>               
									
									<button type="button" id="buscar" class="btn btn-outline-success"><i class="fa fa-search"></i> Buscar</button>
									
								</form><br>
								<div id="resultado">
									
								</div>
						
						</div>
                    </div>	
                </div>	
            </div>	
        </div>		
    </div>
	<form id="form_hidden" style="display:none" action="{{route('asistencias.index')}}" method="GET"><input type="hidden" name="opcion" value="ok"></form>
	
	@endsection

	@section('scripts')
	<script>
		
	</script>
	<script src="{{ asset('archivos_js/Asistencia.js') }}"></script>
@endsection