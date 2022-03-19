@if ($tipov == 1)
    <table id="basic-datatables" class="display table table-bordered-bd-default states">
        <thead>
            <tr>
                <th>N°</th>
                <th>Concejal</th>
                <th>Partido</th>
                <th>Voto</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($resultadosn as $item)

                <tr>

                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nombres . ' ' . $item->apellidos }}</td>
                <td><img src="logos/{{$item->logo}}" alt="" width="60px"> {{ $item->nombre }}</td>
                    <td>{{ $item->plancha }}</td>

                </tr>
            @endforeach
        </tbody>
    </table><br>
    <div class="row">
        @php
        $total=0;
        @endphp
        @foreach ($resultadossecreto as $secreto)


            <div class="col-12 col-sm-6 col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h1><b>{{ $secreto->plancha }}</b></h1>
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





@else
<div class="row">
    @php
    $total=0;
    @endphp
    @foreach ($resultadossecreto as $secreto)


        <div class="col-12 col-sm-6 col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h1><b>{{ $secreto->plancha }}</b></h1>
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
