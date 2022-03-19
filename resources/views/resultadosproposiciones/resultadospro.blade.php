@extends('plantilla.consejales')

@section('content')
<div class="panel-header" style="background-color: #B43437">

        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">RESULTADOS DE PROPOSICIONES</h2>
                    <h5 class="text-white op-7 mb-2">Resultados</h5>
                </div>

            </div>
            <div class="d-flex align-items-right align-items-md-center flex-column flex-md-row">
                <a href="{{route('vista-resultados.index')}}" class="btn btn-warning">Regresar</a>
                </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body"><br>
                        <form id="form_filtro" action="{{ route('resultados-proposiciones.filtro') }}" class="form-inline">
                            <div class="form-group ">
                                <label>Proposición</label>
                                <select name="proposicion_id" id="proposicion_id" class="form-control">
                                    @foreach ($proposiciones as $item)
                                        <option value="{{ $item->proposicion_id }}">{{ $item->proposicion->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group ">
                                <label>Fecha</label>

                                    <input type="date" class="form-control" id="fecha" name="fecha" value="@php echo date('Y-m-d')@endphp">

                            </div>
                            <button type="button" id="buscar" class="btn btn-success"><i class="fa fa-search"></i>
                                Consultar</button>

                        </form><br>
                        <div id="resultado">

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
    <script src="{{ asset('archivos_js/ProposicionFiltro.js') }}"></script>
@endsection
