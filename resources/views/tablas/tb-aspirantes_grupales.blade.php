<div class="table-responsive">
	<table id="basic-datatables" class="table table-striped table-bordered dt-responsive nowrap" >
		<thead>
			<tr>
                <th>N°</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Documento</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Hoja de Vida</th>
                <th>Foto</th>
                <th>Estado</th>
                <th>Opciones</th>
			</tr>
		</thead>
		<tbody>
            @foreach ($aspirantesgrupal as $aspirante)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $aspirante->nombres }}</td>
                    <td>{{ $aspirante->apellidos }}</td>
                    <td>{{ $aspirante->documento }}</td>
                    <td>{{ $aspirante->direccion }}</td>
                    <td>{{ $aspirante->telefono }}</td>
                    <td><a href="hojas_vida_grupal/{{ $aspirante->hoja_vida}}" target="_blank" class="text-success"><img src="{{asset('img/pdf.png')}}" width="32px" height="32px" alt=""></a></td>
                    <td><img src="fotos_aspirantes_grupal/{{ $aspirante->foto }}" alt="" width="60px"></td>

                   <td>
                    @if($aspirante->estado)
                    <button class="btn badge bg-success sm" style="color: #fff" onclick="changeEstado('{{ route('aspirantes-grupales.status', $aspirante->id) }}'); "><i class="fa fa-check"></i> Activo</button>
                    @else
                    <button class="btn badge bg-danger sm" style="color: #fff" onclick="changeEstado('{{ route('aspirantes-grupales.status', $aspirante->id) }}'); "><i class="fa fa-ban"></i> Inactivo</button>
                    @endif</td>
                    <td>

                        <div class="btn-group m-b-10">
                        <button type="button" class="btn btn-warning waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opciones</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item show-details" data-toggle="modal" data-id="{{$aspirante->id}}" data-nombres="{{$aspirante->nombres}}" data-apellidos="{{$aspirante->apellidos}}"
                                data-documento="{{$aspirante->documento}}"  data-telefono="{{$aspirante->telefono}}" data-direccion="{{$aspirante->direccion}}"
                                data-eleccionsocial_id="{{$aspirante->eleccionsocial_id}}"  data-target="#modalEdit"><i class="fa fa-edit"></i> Actualizar</a>

                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
		</tbody>
	</table>
</div>
