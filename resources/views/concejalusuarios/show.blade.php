@extends('plantilla.consejales')

@section('content')
    <div class="panel-header" style="background-color: #B43437">

        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Administración</h2>
                    <h5 class="text-white op-7 mb-2">Usuarios</h5>
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
                            @foreach ($usuarios as $usuario)
                                <form id="form_edit" action="{{ route('concejalusuarios.update', 'concejalusuarios') }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" id="id" name="id" value="{{ $usuario->id }}" >
                                    <input type="hidden" id="persona_id" name="persona_id" value="{{ $usuario->persona_id }}" >
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nombres</label>
                                                <input type="text" name="nombres" id="nombres" class="form-control" value="{{ $usuario->nombres }}" required
                                                    readonly />
                                            </div>
                                            <div class="col-md-6">
                                                <label>Apellidos</label>
                                                <input type="text" name="apellidos" id="apellidos" value="{{ $usuario->apellidos  }}"  class="form-control"
                                                    required readonly />
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Contraseña</label>
                                                <input type="password" name="password1" id="password1" class="form-control"
                                                    required />
                                            </div>
                                            <div class="col-md-6">
                                                <label>Repetir Contraseña</label>
                                                <input type="password" name="password2" id="password2" class="form-control"
                                                    required />
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-center">
                                        <button type="submit" class="btn btn-outline-success waves-effect waves-light">
                                            <i class="fa fa-save"></i> Guardar
                                        </button>
                                    </p>
                                </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    $(function() {


$("#form_edit").submit(function(event) {
    event.preventDefault();
    swal({
            title: 'Sistema de Votación',
            text: "¿Está seguro de guardar la información?",
            type: 'warning',
            confirmButtonText: 'Aceptar',
           confirmButtonColor: '#589B4E',
           cancelButtonText: 'Cancelar',
           cancelButtonColor:'#B43437',
            showCancelButton: true,

        }).then((Delete) => {
            if (Delete) {
               let form = $('#form_edit');
$.ajax({
    data: form.serialize(),
    url: form.attr('action'),
    type: form.attr('method'),
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

                    window.location.href = '../home';
                } else {
                    window.location.href = '../home';
                }
            });


        } else {
            warning(data.warning);
        }

    },
    error: function(data) {

        if (data.status === 422) {
            let errors = $.parseJSON(data.responseText);
            addErrorMessage(errors);
        }
    }
});
            } else {
                swal.close();
            }
        });
});
});


</script>
</script>
@endsection
