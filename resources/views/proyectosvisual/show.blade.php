@extends('plantilla.consejales')

@section('content')
    <div class="panel-header" style="background-color: #B43437">

        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Administración</h2>
                    <h5 class="text-white op-7 mb-2">Proyectos</h5>
                </div>

            </div>
            <div class="d-flex align-items-right align-items-md-center flex-column flex-md-row">
			<a href="{{route('proyectosvisual.index')}}" class="btn btn-warning">Regresar</a>
			</div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body">

                            @foreach ($proyectos as $item)
                                <div class="center">
                                    <h1 class="text-danger">PROYECTO: {{$item->nombre}}</h1>
                                    <h2 >PROPONENTE: {{$item->proponente->nombres.' '.$item->proponente->apellidos}}</h2>
                                    <h3 >PONENTE: {{$item->ponente}} </h3>
                                    <h3>COMISION: {{$item->comision->nombre}}</h3>
                                    <h3 >CO-PONENTE: {{$item->coponente}}</h3>
                                    <h3 >COORDINADOR DE PONENTE: {{$item->coordinador}}</h3>
                                </div><br><br>
                                <div class="row">
                                <div class="col-sm-6 col-md-3">
                                    <a class="stretched-link text-decoration-none nav-link "
                                        href="../archivos_pdf/{{ $item->ruta }}" target="_blank" aria-haspopup="true"
                                        aria-expanded="false">
                                        <div class="card card-stats card-round">
                                            <div class="card-body ">
                                                <div class="row">
                                                    <div class="col-5">
                                                        <img src="{{ asset('img/pdf.png') }}" alt="">
                                                    </div>
                                                    <div class="col-7 col-stats">
                                                        <div class="numbers">
                                                            <p class="card-title">{{ $item->nombre }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @if ($item->ponencia_uno!="")
                                <div class="col-sm-6 col-md-3">
                                    <a class="stretched-link text-decoration-none nav-link "
                                        href="../archivos_ponecias/{{ $item->ponencia_uno }}" target="_blank" aria-haspopup="true"
                                        aria-expanded="false">
                                        <div class="card card-stats card-round">
                                            <div class="card-body ">
                                                <div class="row">
                                                    <div class="col-5">
                                                        <img src="{{ asset('img/pdf.png') }}" alt="">
                                                    </div>
                                                    <div class="col-7 col-stats">
                                                        <div class="numbers">
                                                            <p class="card-title">Ponencia Primer debate</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endif
                                @if ($item->ponencia_dos!="")
                                <div class="col-sm-6 col-md-3">
                                    <a class="stretched-link text-decoration-none nav-link "
                                        href="../archivos_ponecias_dos/{{ $item->ponencia_dos }}" target="_blank" aria-haspopup="true"
                                        aria-expanded="false">
                                        <div class="card card-stats card-round">
                                            <div class="card-body ">
                                                <div class="row">
                                                    <div class="col-5">
                                                        <img src="{{ asset('img/pdf.png') }}" alt="">
                                                    </div>
                                                    <div class="col-7 col-stats">
                                                        <div class="numbers">
                                                            <p class="card-title">Ponencia Segundo Debate</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endif

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

    </script>
@endsection
