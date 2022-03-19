@foreach ($nombre_comision as $item)
    <h2 class="text-danger">{{$item->nombre}}</h2>
@endforeach
<div class="row">
    @if ($cantidad>0)
        @foreach ($comisiones as $comision)
        <div class="col-12 col-sm-6 col-md-3">
            <div class="card border border-success">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5><b> <td>{{ $comision->nombres.' '. $comision->apellidos}}</td></b></h5>
                            <p class="text-muted"></p>
                        </div>
                        <h3 class="text-success fw-bold"><img src="../fotos/{{$comision->foto}}" width="80px" alt=""></IMg></h3>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class="text-muted mb-0"><img src="../logos/{{$comision->logo}}" width="64px" alt=""></p>
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
        <div class="justify-content-center"><h3 class="text-default">No hay personas propuestas en esta comisión</h3></div>
    @endif
</div>

