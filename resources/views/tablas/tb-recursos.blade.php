<div class="table-responsive">
	<table id="basic-datatables" class="table table-striped table-bordered dt-responsive nowrap"  >
		<thead>
			<tr>
                <th>N°</th>
                <th>Nombre</th>
                <th>Archivo</th>
                <th>Carpeta</th>
                <th>Estado</th>
                <th>Opciones</th>
			</tr>
		</thead>
		<tbody>
            @foreach ($recursos as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td><a href="archivos_recursos/{{ $item->ruta }}" target="_blank" class="text-success"><img src="{{asset('img/pdf.png')}}" width="32px" height="32px" alt=""></a></td>

                    <td>{{ $item->carpeta->nombre }}</td>

                    <td>
                        @if($item->estado==1)
                        <button class="btn badge bg-success sm" style="color: #fff" onclick="changeEstado('{{ route('recursos.status', $item->id) }}'); "><i class="fa fa-check"></i> Visible</button>
                        @else
                        <button class="btn badge bg-danger sm" style="color: #fff" onclick="changeEstado('{{ route('recursos.status', $item->id) }}'); "><i class="fa fa-ban"></i> No visible</button>
                        @endif

                    </td>

                    <td>
                        <div class="btn-group m-b-10">

                                <a class="btn badge bg-warning sm" data-toggle="modal" data-id="{{$item->id}}" data-nombre="{{$item->nombre}}" data-descripcion="{{$item->descripcion}}"
                                data-link="{{$item->link}}" data-estado="{{$item->estado}}" data-carpeta_recurso_id="{{$item->carpeta_recurso_id}}" style="color: #fff"   data-target="#modalEdit"><i class="fa fa-edit"></i> Actualizar</a>

                                <button class="btn badge bg-danger sm" style="color: #fff" id="eliminar" onclick="eliminar('{{ route('eliminarrecurso', $item->id) }}'); "><i class="fa fa-ban"></i> Eliminar</button>

                        </div>
                    </td>
                </tr>
            @endforeach
		</tbody>
	</table>
</div>
