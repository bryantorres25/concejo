@extends('plantilla.consejales')

@section('content')
<div class="panel-header" style="background-color: #B43437">

	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">Modulo de Concejo</h2>
			</div>
		</div>
        <div class="d-flex align-items-right align-items-md-center flex-column flex-md-row">
			<a href="{{route('home')}}" class="btn btn-warning">Regresar</a>
			</div>
	</div>
</div>
<div class="page-inner mt--5">
	<div class="card  card-round">

        @if($filas==0)
            @if($cantidad>0)
            <div class="card-body ">
                <!-- Card -->
                <h4 class="page-title">Votaciones</h4>
                @foreach ($votaciones as $item)
                <div class="row">
                    <div class="col-md-12">

                            <div class="card card-white  card-round card ">
                                <div class="card-body text">
                                    <div class="pricing-header">
                                        <h2 class="fw-bold">PROPUESTA POR: <b class="text-danger">{{ $item->proposicion->nombre }}</b></h2>
                                    </div>
                                    <div class="pricing-header">
                                        <h2 class="fw-bold">DESCRIPCION: </h2>
                                        <span class="sub-title">
                                            @if ($item->proposicion->descripcion!="")
                                            <h3>{{ $item->proposicion->descripcion }}</h3>
                                            @else
                                            <b>Sin descripción</b>
                                            @endif
                                        </span>
                                    </div>
                                    <div class="pricing-header">
                                        <h2 class="fw-bold">Fecha Apertura: {{ $item->fecha }} </h2>

                                    </div>
                                    <div class="pricing-header">
                                        <h2 class="fw-bold">Hora: {{ $item->hora }}</h2>

                                    </div>
                                    <div class="pricing-header">
                                        <h2 class="fw-bold">Estado: <b></b></h2>
                                    @if($filas==0)
                                    <span class="sub-title">
                                    Activo
                                    </span>
                                    @else
                                    <span class="sub-title">
                                        Votado
                                    </span>
                                    @endif
                                    </div>

                                </div>
                            </div>

                        @if($filas==0)
                        <a href="{{ route('votaciones-proposiciones.show', $item->id) }}" class="btn btn-outline-success">Ir a Votación</a>
                        @endif

                    </div>

                </div>
                @endforeach

            </div>
            @else
            <p><h2 class="text-danger">No Existen votaciones activas</h2></p>
            @endif
        @else
        <p><h2 class="text-danger">No Existen votaciones activas</h2></p>
        @endif
	</div>
</div>
@endsection
