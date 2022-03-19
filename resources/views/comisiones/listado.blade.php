@extends('plantilla.secretaria')

@section('content')
<div class="panel-header" style="background-color: #B43437">

    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">Administración</h2>
				<h5 class="text-white op-7 mb-2">Comisiones</h5>
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
								<form id="form_filtro" action="{{ route('listado-comisiones.filtro') }}" class="form-inline" >
									<div class="form-group">
                                        <label>Tipo de Comision</label>
                                        <div>
                                            <select name="tipo" id="tipo" class="form-control" >
                                                    <option value="0">Seleccionar</option>
                                                    <option value="1">PERMANENTE</option>
                                                    <option value="2">LEGALES</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Comision</label>
                                        <div>
                                            <select name="comision_id" id="comision_id" class="form-control" >

                                            </select>
                                        </div>
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
	<form id="form_hidden" style="display:none" action="{{route('listado-comisiones.index')}}" method="GET"><input type="hidden" name="opcion" value="ok"></form>

	@endsection

	@section('scripts')
	<script>

	</script>
	<script src="{{ asset('archivos_js/Listado-comision.js') }}"></script>
@endsection
