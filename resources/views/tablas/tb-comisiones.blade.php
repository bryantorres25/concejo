<div class="table-responsive">
	<table id="basic-datatables" class="table table-striped table-bordered dt-responsive nowrap" >
		<thead>
			<tr>
                <th>N°</th>
                <th>Nombre</th>
                <th>Tipo de Comision</th>
                <th>Estado</th>
                <th>Opciones</th>
			</tr>
		</thead>
		<tbody>
            @foreach ($comisiones as $comision)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $comision->nombre }}</td>
                    <td>
                        @if ( $comision->tipo==1 )
                            PERMANENTE
                        @elseif( $comision->tipo==2 )
                            LEGALES
                        @elseif( $comision->tipo==0 )
                            NINGUNA
                        @endif
                    </td>
                    <td>
                        @if($comision->estado)
                        <button class="btn badge bg-success sm" style="color: #fff" onclick="changeEstado('{{ route('comisiones.status', $comision->id) }}'); "><i class="fa fa-check"></i> Activo</button>
                        @else
                        <button class="btn badge bg-danger sm" style="color: #fff" onclick="changeEstado('{{ route('comisiones.status', $comision->id) }}'); "><i class="fa fa-ban"></i> Inactivo</button>
                        @endif
                    </td>
                    <td>

                        <div class="btn-group m-b-10">
                        <button type="button" class="btn btn-warning waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opciones</button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item show-details" data-toggle="modal" data-id="{{$comision->id}}" data-nombre="{{$comision->nombre}}" data-tipo="{{$comision->tipo}}"  data-target="#modalEdit"><i class="fa fa-edit"></i> Actualizar</a>

                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
		</tbody>
	</table>
</div>


