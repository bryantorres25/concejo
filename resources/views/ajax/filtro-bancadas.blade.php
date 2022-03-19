@foreach ($nombre_partido as $item)
    <h2 class="text-danger"><img src="logos/{{$item->logo}}" width="64px" alt=""> {{$item->nombre}}</h2>
@endforeach
<div class="row">
    @if ($cantidad>0)
        @foreach ($partidos as $partido)
        <div class="col-12 col-sm-6 col-md-3">
            <div class="card border border-success">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5><b> <td>{{ $partido->nombres.' '. $partido->apellidos}}</td></b></h5>
                        </div>
                        <h3 class="text-success fw-bold"><img src="fotos/{{$partido->foto}}" width="80px" alt=""></IMg></h3>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class="text-muted mb-0"></p>
                        <p class="text-muted mb-0"></p>
                    </div>
                </div>
            </div>
        </div>
        @php
        $total=0;
            $total=$total+ $loop->iteration ;
        @endphp
        @endforeach
    @else
        <div class="justify-content-center"><h3 class="text-default">No hay Personas en esta bancada</h3></div>
    @endif
</div>
