@foreach ($nombre as $item)
<h2 class="text-danger">PROPOSICION DE: {{ $item->nombre }}</h2>
@endforeach
@if ($validar > 0)
@if($tipovotacion==1)
    <div class="">
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
                    $proposicion_id=$item->proposicion_id;
                    @endphp
                    <tr>

                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->persona->nombres.' '.$item->persona->apellidos }}</td>
                        <th><img src="../logos/{{ $item->persona->partido->logo }}" alt=""
                                width="90px"></th>
                        @if ($item->respuesta == 1)
                            <td>POSITIVO</td>
                            @php

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


                        <td> <img src="../logos/{{ $result->logo }}" alt="" width="60px">
                            {{ $result->nombre }}
                        </td>

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
                            <h1 class="text-success fw-bold">{{ $aprobado }}</h1>
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
                            <h1 class="text-danger fw-bold">{{ $rechazado }}</h1>
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
                            <h1 class="text-info fw-bold">{{ $total }}</h1>
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
                            <h1 class="text-secondary fw-bold"> @php
                                echo max($porcentaje_aprobado, $porcentaje_rechazado);
                                @endphp
                                %</h1>
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
@endif
@else
<div>
    <h2>No hay votos</h2>
</div>
@endif
