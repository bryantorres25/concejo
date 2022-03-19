<div class="table-responsive">
	<table id="basic-datatables" class="table table-striped table-bordered dt-responsive nowrap"  >
		<thead>
			<tr>
                <th>N°</th>
                <th>Fecha</th>
                <th>Nombre</th>
                <th>Estado</th>
                <th>Estado para votación</th>
                <th>Opciones</th>									
			</tr>
		</thead>
		<tbody>
            @foreach ($eleccionessociales as $tipo)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tipo->fecha }}</td>
                    <td>{{ $tipo->nombre }}</td>
                    <td>
                        @if($tipo->estado)
                        <button class="btn badge bg-success sm" style="color: #fff" onclick="changeEstado('{{ route('elecciones-sociales.status', $tipo->id) }}'); "><i class="fa fa-check"></i> Activo</button>
                        @else
                        <button class="btn badge bg-danger sm" style="color: #fff" onclick="changeEstado('{{ route('elecciones-sociales.status', $tipo->id) }}'); "><i class="fa fa-ban"></i> Inactivo</button>
                        @endif
                    </td>
                    <td>
                        @if($tipo->estado_vista==1)
                        <button class="btn badge bg-success sm" style="color: #fff" onclick="changeEstadoVista('{{ route('elecciones-sociales.vistastatus', $tipo->id) }}'); "><i class="fa fa-check"></i> votación Activa</button>
                        @else
                        <button class="btn badge bg-danger sm" style="color: #fff" onclick="changeEstadoVista('{{ route('elecciones-sociales.vistastatus', $tipo->id) }}'); "><i class="fa fa-ban"></i> votación Inactiva</button>
                        @endif
                    </td>
                    <td>

                        <div class="btn-group m-b-10">
                        <button type="button" class="btn btn-warning waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opciones</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item show-details" data-toggle="modal" data-id="{{$tipo->id}}" data-nombre="{{$tipo->nombre}}" data-fecha="{{$tipo->fecha}}"  data-target="#modalEdit"><i class="fa fa-edit"></i> Actualizar</a>
                                
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach						
		</tbody>
	</table>
</div>