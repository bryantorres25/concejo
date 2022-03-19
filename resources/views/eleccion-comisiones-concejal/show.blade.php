@extends('plantilla.consejales')

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
                        <h2 class="text-danger">Detalles de: {{$nombre_plancha}}</h2>
                                <form id="form_filtro" action="{{ route('listado-comisiones-concejales.filtro') }}" class="form-inline" >

                                    <input type="hidden" id="plancha_id" name="plancha_id" value="{{$idplancha}}">
                                    <div class="form-group">
                                        <label>Comision</label>
                                        <div>
                                            <select name="comision_id" id="comision_id" class="form-control" required>
                                                <option value="" selected="selected"> ---- Seleccione ---- </option>
                                                @foreach ($comisiones as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nombre }}</option>$
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

									<button type="button" id="buscar" class="btn btn-outline-success"><i class="fa fa-search"></i> Ver Personas</button>&nbsp;&nbsp;

                                     <a href="{{ route('eleccion-comisiones-concejal.index') }}" class="btn btn-warning"> Regresar a Votación</a>

								</form><br>
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
	<script src="{{ asset('archivos_js/Listado-comision.js') }}"></script>
@endsection
