<div class="table-responsive">
	<table id="basic-datatables" class="table table-striped table-bordered dt-responsive nowrap" >
		<thead>
			<tr>
                <th>N°</th>
                <th>Nombre</th>
                <th>Logo</th>
                <th>Estado</th>
                <th>Opciones</th>									
			</tr>
		</thead>
		<tbody>
            @foreach ($partidos as $partido)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $partido->nombre }}</td>
                    <td><img src="logos/{{ $partido->logo }}" alt="" width="100px" ></td>
                    <td>
                        @if($partido->estado)
                        <button class="btn badge bg-success sm" style="color: #fff" onclick="changeEstado('{{ route('partidos.status', $partido->id) }}'); "><i class="fa fa-check"></i> Activo</button>
                        @else
                        <button class="btn badge bg-danger sm" style="color: #fff" onclick="changeEstado('{{ route('partidos.status', $partido->id) }}'); "><i class="fa fa-ban"></i> Inactivo</button>
                        @endif
                    </td>
                    <td>

                        <div class="btn-group m-b-10">
                        <button type="button" class="btn btn-warning waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opciones</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item show-details" data-toggle="modal" data-id="{{$partido->id}}" data-nombre="{{$partido->nombre}}"   data-target="#modalEdit"><i class="fa fa-edit"></i> Actualizar</a>
                                
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach						
		</tbody>
	</table>
</div>