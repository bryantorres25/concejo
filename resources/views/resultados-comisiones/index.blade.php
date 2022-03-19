@extends('plantilla.secretaria')

@section('content')
<div class="panel-header" style="background-color: #B43437">

        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Administración</h2>
                    <h5 class="text-white op-7 mb-2">Resultados de Comisiones</h5>
                </div>

            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body"><br>
                        <form id="form_filtro" action="{{ route('resultados-comisiones.filtro') }}" class="form-inline">
                            <div class="form-group ">
                                <label>fecha</label>
                                <input type="date" id="fecha" name="fecha" class="form-control" required value="@php echo date('Y-m-d') @endphp">
                            </div>
                            <button type="button" id="buscar" class="btn btn-outline-success"><i class="fa fa-search"></i>
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
    <script src="{{ asset('archivos_js/ResultadoComision.js') }}"></script>
@endsection
