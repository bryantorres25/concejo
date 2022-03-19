<div class="table-responsive">
	<table id="basic-datatables" class="table table-striped table-bordered dt-responsive nowrap" >
		<thead>
			<tr>
                <th>N°</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Información Adicional</th>
                <th>Archivo</th>
                <th>Proponente</th>
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
                    
                    <td>{{ $item->proponente->nombres.' '. $item->proponente->apellidos }}</td>
                </tr>
            @endforeach
		</tbody>
	</table>
</div>
