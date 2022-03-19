@extends('plantilla.consejales')

@section('content')
    <div class="panel-header" style="background-color: #B43437">

        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Administración</h2>
                    <h5 class="text-white op-7 mb-2">Hojas de Vida de Aspirantes</h5>
                </div>

            </div>
            <div class="d-flex align-items-right align-items-md-center flex-column flex-md-row">
                <a href="{{ route('hojas-vida.index') }}" class="btn btn-warning">Regresar</a>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="text-center"><h1 class="text-danger">{{$nombreeleccion}}</h1></div>

                                 <div class="row">
                                @if ($cantidad_hojas != 0)
                                    @foreach ($hojas as $item)
                                        <div class="col-12 col-sm-7 col-md-3">
                                            <div class="card border border-success">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <h2><b> {{ $item->nombres.' '.$item->apellidos }}</b></h2>
                                                        </div>

                                                    </div>
                                                    <div class="d-flex justify-content-between mt-2">
                                                        <p class="text-muted mb-0"><img src="../fotos_aspirantes/{{ $item->foto }}" alt=""
                                                                width="60px"></p>
                                                    <a  target="_blank" href="../hojas_vida/{{$item->hoja_vida }}" ><img
                                                                src="{{asset('img/pdf.png')}}" alt="" width="60px"></a>

                                                    </div>
                                                </div>

                                            </div>

                                        </div>


                                    @endforeach

                                        @else
                                        <h4 class="text-danger">NO HAY ASPIRANTES A ESTA ELECCION</h4>
                                    @endif

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


        $(function() {


            $("#form_create").submit(function(event) {
                event.preventDefault();
                swal({
                    title: 'Sistema de Votación',
                    text: "¿Está seguro de guardar la información?",
                    type: 'warning',
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#589B4E',
                    cancelButtonText: 'Cancelar',
                    cancelButtonColor: '#B43437',
                    showCancelButton: true,

                }).then((Delete) => {
                    if (Delete) {
                        let form = $('#form_create');
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

                                            window.location.href = 'resultadoscom';
                                        } else {
                                            window.location.href = 'resultadoscom';
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
<script src="{{asset('archivos_js/EleccionComisionConcejal.js')}}"></script>
@endsection
