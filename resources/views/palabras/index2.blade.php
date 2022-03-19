@extends('plantilla.secretaria')

@section('content')
<div class="panel-header" style="background-color: #B43437">

    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">Administración</h2>
				<h5 class="text-white op-7 mb-2">Pedir palabra</h5>
			</div>

		</div>
	</div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
				<div class="card full-height">
					<div class="card-body">
					<div class="col-md-12"><br>
						
									<form id="form_filtro_2" action="{{ route('palabras-listado-secretaria.filtrolistadosecre') }}" class="form-inline" >
										<div class="form-group">
											<label for="">Fecha: </label>
											<input type="date" class="form-control" name="fecha" id="fecha" value="@php
												echo date('Y-m-d')
											@endphp"/>
										</div>
										<button type="button" id="buscarlistado" class="btn btn-warning"><i class="fa fa-hand"></i> Ver listado</button>
		
									</form>
							
								<br><br>

								

								
								<div id="resultado">

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
	<script src="{{ asset('archivos_js/Palabra.js') }}"></script>
@endsection
