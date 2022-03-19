@extends('plantilla.secretaria')

@section('content')
<div class="panel-header" style="background-color: #B43437">

    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">Administración</h2>
				<h5 class="text-white op-7 mb-2">Proposiciones</h5>
			</div>

		</div>
	</div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
				<div class="card full-height">
					<div class="card-body">
                    <div class="col-md-12"><br>
                        <div class="table-responsive">
                            <table id="basic-datatables" class="table table-striped table-bordered dt-responsive nowrap"  >
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Concejal</th>
                                        <th>Archivo</th>
                                        <th>Descripción</th>
                                        <th>Bancada</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proposiciones as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nombre }}</td>
                                            <td>
                                                @if ($item->ruta!="")
                                                <a href="archivos_proposiciones/{{ $item->ruta }}" target="_blank" class="text-success"><img src="{{asset('img/pdf.png')}}" width="32px" height="32px" alt=""></a>
                                                @else
                                                <p>Sin Archivo</p>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->descripcion!="")
                                                {{ $item->descripcion }}
                                                @else
                                                <p>Sin descripcion</p>
                                                @endif
                                            </td>

                                            <td>{{ $item->bancada }}</td>
                                            <td>

                                                        <a class="btn btn-warning" data-toggle="modal" data-id="{{$item->id}}" data-nombre="{{$item->nombre}}"
                                                        data-bancada="{{ $item->bancada}}"   data-target="#modalAutorizacion"><i class="fa fa-edit"></i> Autorizar</a>

                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
	<form id="form_hidden" style="display:none" action="{{route('proposiciones-votaciones.index')}}" method="GET"><input type="hidden" name="opcion" value="ok"></form>
	@include('modals.autorizar-proposicion')

	@endsection

	@section('scripts')
	<script>

	</script>
	<script src="{{ asset('archivos_js/ProposicionVotacion.js') }}"></script>
@endsection
