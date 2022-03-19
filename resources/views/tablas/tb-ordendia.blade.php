<div class="table-responsive">
	<table id="basic-datatables" class="table table-striped table-bordered dt-responsive nowrap"  >
		<thead>
			<tr>
                <th>N°</th>
                <th>Fecha</th>
                <th>Archivo</th>
                <th>Opciones</th>
			</tr>
		</thead>
		<tbody>
            @foreach ($ordendia as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->fecha }}</td>
                    <td><a href="archivos_ordendia/{{ $item->ruta }}" target="_blank" class="text-success"><img src="{{asset('img/pdf.png')}}" width="32px" height="32px" alt=""></a></td>

                    <td>


                     <a class="btn badge bg-warning sm" data-toggle="modal" data-id="{{$item->id}}" data-fecha="{{$item->fecha}}"
                                  data-target="#modalEdit" style="color: #fff"><i class="fa fa-edit"></i> Actualizar</a>

                        <button class="btn badge bg-danger sm" style="color: #fff" id="eliminar" onclick="eliminar('{{ route('eliminarordendia', $item->id) }}'); "><i class="fa fa-ban"></i> Eliminar</button>

                    </td>
                </tr>
            @endforeach
		</tbody>
	</table>
</div>
