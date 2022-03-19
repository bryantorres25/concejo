@extends('plantilla.consejales')

@section('content')
    <div class="panel-header" style="background-color: #B43437">

        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Administración</h2>
                    <h5 class="text-white op-7 mb-2">Elecciones de Comisiones</h5>
                </div>

            </div>
            <div class="d-flex align-items-right align-items-md-center flex-column flex-md-row">
                <a href="{{ route('home') }}" class="btn btn-warning">Regresar</a>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="col-md-12">
                            <form id="form_create" action="{{ route('eleccion-comisiones-concejal.store') }}" method="POST">
                                @csrf
                                <style>
                                    input[type=checkbox] {
                                        /* Double-sized Checkboxes */
                                        -ms-transform: scale(2);
                                        /* IE */
                                        -moz-transform: scale(2);
                                        /* FF */
                                        -webkit-transform: scale(2);
                                        /* Safari and Chrome */
                                        -o-transform: scale(2);
                                        /* Opera */
                                        transform: scale(2);
                                        padding: 10px;
                                        background-color: green;
                                    }

                                    /* Might want to wrap a span around your checkbox text */
                                    .checkboxtext {
                                        /* Checkbox text */
                                        font-size: 110%;
                                        display: inline;
                                    }

                                </style>
                                 <div class="row">
                                @if ($cantidad_persona == 0)
                                @if ($cantidad_plancha != 0)
                                    @foreach ($planchas as $item)
                                        <div class="col-12 col-sm-7 col-md-3">
                                            <div class="card border border-success">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <h2><b> {{ $item->nombre }}</b></h2>
                                                            <h4>{{ $item->nombres . ' ' . $item->apellidos }}</h4>
                                                        </div>

                                                    </div>
                                                    <div class="d-flex justify-content-between mt-2">
                                                        <p class="text-muted mb-0"><img src="fotos/{{ $item->foto }}" alt=""
                                                                width="60px"></p>
                                                    <a class="btn btn-success" href="{{route('eleccion-comisiones-concejal.show',$item->id)}}" ><img
                                                                src="{{asset('img/anadir.png')}}" alt="" width="50px"></a>

                                                    </div>
                                                </div>
                                                <p class="text-center"><input type="checkbox" name="opciones[]"
                                                        value="{{ $item->id }}" /></p>
                                            </div>

                                        </div>


                                    @endforeach
                                    <input type="hidden" value="{{ $item->id }}" name="plancha_id" id="plancha_id">
                                    <input type="hidden" name="persona_id" id="persona_id"
                                        value="{{ auth()->user()->persona_id }}">
                                 </div>
                                    <p class="text-center"><button type="submit" class="btn btn-outline-success">
                                        Guardar Votación</button></p>
                                        @else
                                        <h4 class="text-danger">NO HAY ELECCIONES</h4>
                                    @endif
                                @else
                                    <h4 class="text-danger">SU VOTO YA HA SIDO REGISTRADO</h4>
                                @endif



                            </form><br>
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
