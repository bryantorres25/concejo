<div class="table-responsive">
	<table id="basic-datatables" class="table table-striped table-bordered dt-responsive nowrap"  >
		<thead>
			<tr>
                <th>N°</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Información Adicional</th>
                <th>Archivo</th>             
                <th>Estado</th>
                <th>Opciones</th>
			</tr>
		</thead>
		<tbody>
            @foreach ($proyectos as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->descripcion }}</td>
                    <td>{{ $item->anexos }}</td>
                    <td><a href="archivos_pdf/{{ $item->ruta }}" target="_blank" class="text-success"><img src="{{asset('img/pdf.png')}}" width="32px" height="32px" alt="">Ver proyecto</a></td>
                    
                    <td>
                        @if($item->estado)
                        <button class="btn badge bg-success sm" style="color: #fff" onclick="changeEstado('{{ route('proyectos-secreta.status', $item->id) }}'); "><i class="fa fa-check"></i> Activo</button>
                        @else
                        <button class="btn badge bg-danger sm" style="color: #fff" onclick="changeEstado('{{ route('proyectos-secreta.status', $item->id) }}'); "><i class="fa fa-ban"></i> Inactivo</button>
                        @endif
                    </td>

                    <td>
                        <div class="btn-group m-b-10">
                            <button type="button" class="btn btn-warning waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opciones</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item show-details" data-toggle="modal" data-id="{{$item->id}}" data-nombre="{{$item->nombre}}" data-descripcion="{{$item->descripcion}}"
                                data-anexos="{{$item->anexos}}" data-target="#modalEdit"><i class="fa fa-edit"></i> Actualizar</a>

                                <a class="dropdown-item show-details" data-toggle="modal" data-id="{{$item->id}}" data-nombre="{{$item->nombre}}" data-descripcion="{{$item->descripcion}}"
                                data-anexos="{{$item->anexos}}" data-target="#modalAutorizacion"><i class="fa fa-check"></i> Autorizar Votación</a>

                                <p class="text-center">
                                    @if($item->estado_vista==1)
                                    <button class="btn badge bg-success sm" style="color: #fff" onclick="changeEstadoVista('{{ route('proyectos-secreta.vistastatus', $item->id) }}'); "><i class="fa fa-check"></i> Visible</button>
                                   @else
                                       <button class="btn badge bg-danger sm" style="color: #fff" onclick="changeEstadoVista('{{ route('proyectos-secreta.vistastatus', $item->id) }}'); "><i class="fa fa-window-close"></i> No visible</button>
                                   @endif
                                 </p>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
		</tbody>
	</table>
</div>
