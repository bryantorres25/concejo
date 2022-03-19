@extends('plantilla.secretaria')

@section('content')
<div class="panel-header" style="background-color: #B43437">

    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">Administración</h2>
				<h5 class="text-white op-7 mb-2">ELECCIÓN DE COMISIONES</h5>
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
								<a href="{{ route('eleccion-comisiones.create') }}" type="button" class="btn btn-outline-success waves-effect waves-light"
									>
									<i class="fa fa-plus-circle"></i> Agregar
								</a><br><br>
								<div id="id_table">
									@include('tablas.tb-eleccion-comisiones')
								</div>

						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<form id="form_hidden" style="display:none" action="{{route('eleccion-comisiones.index')}}" method="GET"><input type="hidden" name="opcion" value="ok"></form>

	@endsection

	@section('scripts')
	<script>
        //FUNCION DE ESTADOS
const changeEstado = (url) => {
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(data) {

            if (data.success) {
                success(data.success);
                updateTable();
            } else {
                warning(data.warning);
            }

        },
    });
}
const eliminar = (url) => {
    swal({
        title: 'Sistema de Votación',
        text: "¿Está seguro de Eliminar esta plancha?",
        type: 'warning',
        confirmButtonText: 'Aceptar',
        confirmButtonColor: '#589B4E',
        cancelButtonText: 'Cancelar',
        cancelButtonColor: '#B43437',
        showCancelButton: true,
    }).then((Delete) => {
        if (Delete) {
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (data.success) {
                        swal({
                            title: 'Sistema de Votación',
                            text: data.success,
                            type: 'success',
                            allowOutsideClick: false,
                            confirmButtonColor: '#589B4E',
                        }).then((Delete) => {
                            if (Delete) {
                                window.location.href = 'eleccion-comisiones';
                            } else {
                                window.location.href = 'eleccion-comisiones';
                            }
                        });
                    } else {
                        warning(data.warning);
                    }
                },
            });
        } else {
            swal.close();
        }
    });

}
	</script>

@endsection
