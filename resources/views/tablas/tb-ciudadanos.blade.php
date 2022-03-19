<div class="table-responsive">
	<table id="basic-datatables" class="table table-striped table-bordered dt-responsive nowrap" >
		<thead>
			<tr>
                <th>N°</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Documento</th>
                <th>Estado</th>
                <th>Opciones</th>									
			</tr>
		</thead>
		<tbody>
            @foreach ($ciudadanos as $ciudadano)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $ciudadano->nombres }}</td>
                    <td>{{ $ciudadano->apellidos }}</td>
                    <td>{{ $ciudadano->documento }}</td>
                    <td>
                        @if($ciudadano->estado)
                        <button class="btn badge bg-success sm" style="color: #fff" onclick="changeEstado('{{ route('ciudadanos.status', $ciudadano->id) }}'); "><i class="fa fa-check"></i> Activo</button>
                        @else
                        <button class="btn badge bg-danger sm" style="color: #fff" onclick="changeEstado('{{ route('ciudadanos.status', $ciudadano->id) }}'); "><i class="fa fa-ban"></i> Inactivo</button>
                        @endif
                    </td>
                    <td>
                        <div class="btn-group m-b-10">
                        <button type="button" class="btn btn-warning waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opciones</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item show-details" data-toggle="modal" data-id="{{$ciudadano->id}}" data-nombres="{{$ciudadano->nombres}}" data-apellidos="{{$ciudadano->apellidos}}"
                                data-documento="{{$ciudadano->documento}}"  data-target="#modalEdit"><i class="fa fa-edit"></i> Actualizar</a>                                
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach						
		</tbody>
	</table>
</div>