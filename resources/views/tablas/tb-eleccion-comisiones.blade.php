<div class="table-responsive">
	<table id="basic-datatables" class="table table-striped table-bordered dt-responsive nowrap" >
		<thead>
			<tr>
                <th>N°</th>
                <th>Fecha</th>
                <th>Nombre</th>
                <th>postulante</th>
                <th>Opciones</th>
			</tr>
		</thead>
		<tbody>
            @foreach($planchas as $plancha)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$plancha->fecha}}</td>
                    <td>{{$plancha->nombre}}</td>
                    <td>{{$plancha->nombres.' '.$plancha->apellidos}}</td>
                    <td>
                        <div class="btn-group m-b-10">

                                <p class="text-center">
                                    @if($plancha->estado==1)
                                    <button class="btn badge bg-success sm" style="color: #fff" onclick="changeEstado('{{ route('eleccion-comisiones.status', $plancha->id) }}'); "><i class="fa fa-check"></i> Activo</button>
                                   @else
                                       <button class="btn badge bg-danger sm" style="color: #fff" onclick="changeEstado('{{ route('eleccion-comisiones.status', $plancha->id) }}'); "><i class="fa fa-window-close"></i> Inactivo</button>
                                   @endif
                                 <button class="btn badge bg-danger sm" style="color: #fff" id="eliminar" onclick="eliminar('{{ route('eliminarplancha', $plancha->id) }}'); "><i class="fa fa-ban"></i> Eliminar</button>

                                 </p>
                        </div>
                    </td>
                </tr>
            @endforeach
		</tbody>
	</table>
</div>
