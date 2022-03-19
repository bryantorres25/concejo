@extends('plantilla.secretaria')

@section('content')
    <div class="panel-header bg-danger-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">Administración</h2>
				<h5 class="text-white op-7 mb-2">Detalles</h5>
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
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tr>
                                        <th>Motivo</th>
                                        <td>{{ $orden->descripcion }}</td>
                                    </tr>
                                    <tr>
                                        <th>Fecha</th>
                                        <td>{{ $orden->fecha }}</td>
                                    </tr>
                                    <tr>
                                        <th colspan="2"><center>DETALLES</center></th>
                                    </tr>
                                    <tr>
                                        <th>N°</th>
                                        <th>Descripción</th>
                                    </tr>
                                    @foreach ($orden->detalles as $item)
                                        <tr>
                                            <th>{{ $item->posicion }}</th>
                                            <td>{{ $item->descripcion }}</td>
                                        </tr>
                                    @endforeach

                                </table>
                                <a href="{{ route('ordenes.index') }}" class="btn btn-danger">Volver</a>
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
	<script src="{{ asset('archivos_js/FilaDinamicas.js') }}"></script>
@endsection