<div class="table-responsive">
	<table id="basic-datatables" class="table table-striped table-bordered dt-responsive nowrap" >
		<thead>
			<tr>
                <th>N°</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Documento</th>
                <th>Cargo</th>
                <th>Email</th>
                <th>Tipo</th>
                <th>Estado</th>
                <th>Opciones</th>
			</tr>
		</thead>
		<tbody>
            @foreach ($proponentes as $proponente)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $proponente->nombres }}</td>
                    <td>{{ $proponente->apellidos }}</td>
                    <td>{{ $proponente->documento }}</td>
                    <td>{{ $proponente->cargo }}</td>
                    <td>{{ $proponente->correo }}</td>
                    <td>{{ $proponente->tipo }}</td>
                    <td>
                        @if($proponente->estado)
                        <button class="btn badge bg-success sm" style="color: #fff" onclick="changeEstado('{{ route('proponentes.status', $proponente->id) }}'); "><i class="fa fa-check"></i> Activo</button>
                        @else
                        <button class="btn badge bg-danger sm" style="color: #fff" onclick="changeEstado('{{ route('proponentes.status', $proponente->id) }}'); "><i class="fa fa-ban"></i> Inactivo</button>
                        @endif
                    </td>
                    <td>
                        <div class="btn-group m-b-10">
                        <button type="button" class="btn btn-warning waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opciones</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item show-details" data-toggle="modal" data-id="{{$proponente->id}}" data-nombres="{{$proponente->nombres}}" data-apellidos="{{$proponente->apellidos}}"
                                data-documento="{{$proponente->documento}}" data-cargo="{{$proponente->cargo}}" data-correo="{{$proponente->correo}}"
                                data-tipo="{{$proponente->tipo}}" data-target="#modalEdit"><i class="fa fa-edit"></i> Actualizar</a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
		</tbody>
	</table>
</div>
