@extends('plantilla.consejales')

@section('content')
<div class="panel-header" style="background-color: #B43437">

    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">Administración</h2>
				<h5 class="text-white op-7 mb-2">Pedir palabra</h5>
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
					<div class="col-md-12"><br>
						<div class="form-group">
							<div class="row">
								<div class="col-md-1.5">
									<form id="form_filtro" action="{{ route('palabras.filtro') }}" class="form-inline" >

										<input type="hidden" name="persona_id" id="persona_id" class="form-control" required value="{{auth()->user()->persona_id}}
										"/ >


									<button type="button" id="buscar" class="btn btn-success"><i class="fa fa-hand"></i> Pedir Palabra</button>

								</form>
								</div>

								<div class="col-md-3">
									<form id="form_filtro_2" action="{{ route('palabras-listado.filtrolistado') }}" class="form-inline" >

										<button type="button" id="buscarlistado" class="btn btn-warning"><i class="fa fa-hand"></i> Ver listado</button>

									</form>
                                </div>


                            </form>
							</div>
						</div>
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
