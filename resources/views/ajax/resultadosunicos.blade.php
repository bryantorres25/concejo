
    <h2 class="text-danger">{{ $nombre_eleccion }}</h2>

<div class="row">
    @if ($cantidad > 0)
        @php
        $total=0;
        @endphp
        @if ($tipovotacion == 2)
            @foreach ($resultados as $resultado)
                <div class="col-12 col-sm-6 col-md-6">
                    <div class="card border border-success">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h1><b>
                                            <td>{{ $resultado->nombres . ' ' . $resultado->apellidos }}</td>
                                        </b></h1>
                                </div>
                                <h3 class="text-success fw-bold"><img src="fotos_aspirantes/{{ $resultado->foto }}"
                                        width="80px" alt=""></h3>
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <p class="text-muted mb-0">
                                <h1 class="text-danger">Total Votos: {{ $resultado->votos }}</h1>
                                </p>
                                <p class="text-muted mb-0"></p>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                $total=$total+$resultado->votos;
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
        @else
            <table id="basic-datatables" class="display table table-bordered-bd-default states">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Concejal</th>
                        <th>Partido</th>
                        <th>Votó Por:</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($resultadosn as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->concejal . ' ' . $item->concejalapellidos }}</td>
                            <td>{{ $item->nombre }}</td>
                            <td>{{ $item->aspirante . ' ' . $item->aspiranteapellidos }}</td>
                            <td>{{ $item->fecha }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table><br>

            <table id="basic-datatables" class="display table table-bordered-bd-default states">
                <thead>
                    <tr>
                        <th>Bancada</th>
                        <th>Aspirante</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($resultadosbancadas as $result)
                        <tr>
                            <td> <img src="logos/{{ $result->logo }}" alt="" width="60px"> {{ $result->nombre }}
                            </td>
                            <td>{{ $result->aspirante . ' ' . $result->apellidos }}</td>
                            <td>{{ $result->cantidad }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table><br>
            <div class="row">
                @foreach ($resultados as $resultado)
                    <div class="col-12 col-sm-6 col-md-6">
                        <div class="card border border-success">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h1><b>
                                                <td>{{ $resultado->nombres . ' ' . $resultado->apellidos }}</td>
                                            </b></h1>
                                    </div>
                                    <h3 class="text-success fw-bold"><img src="fotos_aspirantes/{{ $resultado->foto }}" width="80px"
                                            alt="">
                                    </h3>
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    <p class="text-muted mb-0">
                                    <h1 class="text-danger">Total Votos: {{ $resultado->votos }}</h1>
                                    </p>
                                    <p class="text-muted mb-0"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                    $total=$total+$resultado->votos;
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
        <div class="justify-content-center">
            <h3 class="text-default">No hay Votos</h3>
        </div>
    @endif
</div>
