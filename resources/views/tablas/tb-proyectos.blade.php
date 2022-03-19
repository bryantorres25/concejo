<div class="table-responsive">
	<table id="basic-datatables" class="table table-striped table-bordered dt-responsive nowrap"  >
		<thead>
			<tr>
                <th>N°</th>
                <th>Nombre</th>
                <th>Ponente</th>
                <th>Comision</th>
                <th>Co-ponente</th>
                <th>Coordinador Ponente</th>
                <th>Archivo</th>
                <th>Proponente</th>
                <th>Estado</th>
                <th>Opciones</th>
			</tr>
		</thead>
		<tbody>
            @foreach ($proyectos as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->ponente }}</td>
                    <td>{{ $item->comision->nombre }}</td>
                    <td>{{ $item->coponente }}</td>
                    <td>{{ $item->coordinador }}</td>
                    <td><a href="archivos_pdf/{{ $item->ruta }}" target="_blank" class="text-success"><img src="{{asset('img/pdf.png')}}" width="32px" height="32px" alt="">Ver proyecto</a></td>
                    <td>{{ $item->proponente->nombres.' '. $item->proponente->apellidos }}</td>
                    <td>{{ $item->estado }}</td>

                    <td>
                        <div class="btn-group m-b-10">
                            <button type="button" class="btn btn-warning waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opciones</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item show-details" data-toggle="modal" data-id="{{$item->id}}" data-nombre="{{$item->nombre}}" data-descripcion="{{$item->descripcion}}"
                                data-anexos="{{$item->anexos}}" data-proponente_id="{{ $item->proponente_id}}" data-ponente="{{$item->ponente}}" data-coponente="{{$item->coponente}}"
                                data-coordinador="{{$item->coordinador}}" data-comision_id="{{$item->comision_id}}" data-estado="{{$item->estado}}" data-target="#modalEdit"><i class="fa fa-edit"></i> Actualizar</a>

                                <a class="dropdown-item show-details" data-toggle="modal" data-id="{{$item->id}}" data-nombre="{{$item->nombre}}" data-descripcion="{{$item->descripcion}}"
                                data-anexos="{{$item->anexos}}" data-target="#modalAutorizacion"><i class="fa fa-check"></i> Autorizar Votación</a>

                                <p class="text-center">
                                    @if($item->estado_vista==1)
                                    <button class="btn badge bg-success sm" style="color: #fff" onclick="changeEstadoVista('{{ route('proyectos.vistastatus', $item->id) }}'); "><i class="fa fa-check"></i> Visible</button>
                                   @else
                                       <button class="btn badge bg-danger sm" style="color: #fff" onclick="changeEstadoVista('{{ route('proyectos.vistastatus', $item->id) }}'); "><i class="fa fa-window-close"></i> No visible</button>
                                   @endif

                                 </p>

                            </div>
                        </div>
                        <button class="btn badge bg-danger sm" style="color: #fff" id="eliminar" onclick="eliminar('{{ route('eliminarproyecto', $item->id) }}'); "><i class="fa fa-ban"></i> Eliminar</button>

                    </td>
                </tr>
            @endforeach
		</tbody>
	</table>
</div>
