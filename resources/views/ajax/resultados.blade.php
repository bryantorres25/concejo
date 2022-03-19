<script src="{{ asset('js/core/jquery.3.2.1.min.js') }}"></script>

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
                                        $('#opciones').hide();
                                        window.location.href = 'home';
                                    } else {
                                        window.location.href = 'home';
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

@if ($cantidadresultado>0)
@if ($tipovotacion == 1)
<table id="basic-datatables" class="display table table-bordered-bd-default states">
    <thead>
        <tr>
            <th>N°</th>
            <th>Concejal</th>
            <th>Partido</th>
            <th>Voto</th>
            <th>Fecha</th>
            <th>Hora</th>
        </tr>
    </thead>
    <tbody>
        @php
        $aprobado=0;
        $rechazado=0;
        $nombre='';
        @endphp
        @foreach ($resultados as $item)
            @php
            $proyecto_id=$item->proyecto_id;
            @endphp
            <tr>

                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->persona->nombres.' '.$item->persona->apellidos }}</td>
                <th><img src="logos/{{ $item->persona->partido->logo }}" alt="" width="90px"></th>
                @if ($item->respuesta == 1)
                    <td>POSITIVO</td>
                    @php
                    $nombre=$item->proyecto->descripcion;
                    $aprobado++;
                    @endphp
                @endif
                @if ($item->respuesta == 0)
                    <td>NEGATIVO</td>
                    @php
                    $rechazado++;
                    @endphp
                @endif

                <th>{{ $item->fecha }}</th>
                <th>{{ $item->hora }}</th>
            </tr>
        @endforeach
    </tbody>
</table><br>
@php
$total=$aprobado+$rechazado;
$porcentaje_aprobado=round(($aprobado/$total)*100, 2);
$porcentaje_rechazado=round(($rechazado/$total)*100, 2);

@endphp

<table id="basic-datatables" class="display table table-bordered-bd-default states">
    <thead>
        <tr>
            <th>Bancada</th>
            <th>Voto</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($resultadosbancadas as $result)
            <tr>


                <td> <img src="logos/{{ $result->logo }}" alt="" width="60px"> {{ $result->nombre }}</td>

                @if ($result->respuesta == 1)
                    <td>POSITIVO</td>
                @endif
                @if ($result->respuesta == 0)
                    <td>NEGATIVO</td>
                @endif
                <td>{{ $result->cantidad }}</td>
            </tr>
        @endforeach
    </tbody>
</table><br>
<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h1><b>POSITIVOS</b></h1>
                        <p class="text-muted">Total votos</p>
                    </div>
                    <h2 class="text-success fw-bold">{{ $aprobado }}</h2>
                </div>

                <div class="d-flex justify-content-between mt-2">
                    <p class="text-muted mb-0"></p>
                    <p class="text-muted mb-0"></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h1><b>NEGATIVOS</b></h1>
                        <p class="text-muted">Total Votos</p>
                    </div>
                    <h2 class="text-danger fw-bold">{{ $rechazado }}</h2>
                </div>

                <div class="d-flex justify-content-between mt-2">
                    <p class="text-muted mb-0"></p>
                    <p class="text-muted mb-0"></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h1><b>TOTAL VOTOS</b></h1>
                        <p class="text-muted">Total</p>
                    </div>
                    <h2 class="text-info fw-bold">{{ $total }}</h2>
                </div>

                <div class="d-flex justify-content-between mt-2">
                    <p class="text-muted mb-0"></p>
                    <p class="text-muted mb-0"></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h1><b>TOTAL GENERAL</b></h1>
                        <p class="text-muted">Total</p>
                    </div>
                    <h2 class="text-secondary fw-bold"> @php
                        echo max($porcentaje_aprobado, $porcentaje_rechazado);
                        @endphp
                        %</h2>
                </div>

                <div class="d-flex justify-content-between mt-2">
                    <p class="text-muted mb-0"></p>
                    <p class="text-muted mb-0"></p>
                </div>
            </div>
        </div>
    </div>
</div>





@else

    <div class="row">
        @php
        $total=0;
        @endphp
        @foreach($resultadossecreto as $secreto)

        @if($secreto->respuesta==1)
            <div class="col-12 col-sm-6 col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h1><b>POSITIVOS</b></h1>
                                <p class="text-muted">Total votos</p>
                            </div>
                            <h1 class="text-success fw-bold">{{ $secreto->cantidad }}</h1>
                        </div>

                        <div class="d-flex justify-content-between mt-2">
                            <p class="text-muted mb-0"></p>
                            <p class="text-muted mb-0"></p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if($secreto->respuesta==0)
            <div class="col-12 col-sm-6 col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h1><b>NEGATIVOS</b></h1>
                                <p class="text-muted">Total votos</p>
                            </div>
                            <h1 class="text-success fw-bold">{{ $secreto->cantidad }}</h1>
                        </div>

                        <div class="d-flex justify-content-between mt-2">
                            <p class="text-muted mb-0"></p>
                            <p class="text-muted mb-0"></p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @php
        $total=$total+$secreto->cantidad;
        @endphp
        @endforeach
        <div class="col-12 col-sm-6 col-md-6">
            <div class="card border border-success">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h1><b>
                                    <td>Total de Votos: {{ $total }}</td>
                                </b></h1>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class="text-muted mb-0"></p>
                        <p class="text-muted mb-0"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endif
@else
    <h2>No hay votos</h2>
@endif
