<div class="table-responsive">
	<table id="basic-datatables" class="table table-striped table-bordered dt-responsive nowrap"  >
		<thead>
			<tr>
                <th>N°</th>
                <th>Concejal</th>
                <th>Archivo</th>
                <th>Descripcion</th>
                <th>Bancada</th>
                <th>Opciones</th>
			</tr>
		</thead>
		<tbody>
            @foreach ($proposiciones as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>
                        @if ($item->ruta!="")
                        <a href="archivos_proposiciones/{{ $item->ruta }}" target="_blank" class="text-success"><img src="{{asset('img/pdf.png')}}" width="32px" height="32px" alt=""></a>
                        @else
                        <p>Sin Archivo</p>
                        @endif
                    </td>
                    <td>
                        @if ($item->descripcion!="")
                        {{ $item->descripcion }}
                        @else
                        <p>Sin descripcion</p>
                        @endif
                    </td>
                    <td>{{ $item->bancada }}</td>
                    <td>

                        @if (auth()->user()->persona_id==$item->persona_id)
                            @php
                                $proposicionvotacion=DB::table('proposicion_votaciones')->where('proposicion_id',$item->id)->get();
                                $cantidad=count($proposicionvotacion);
                            @endphp
                            @if ($cantidad==0)
                                <a class="btn badge bg-success sm" data-toggle="modal" data-id="{{$item->id}}" data-nombre="{{$item->nombre}}" data-bancada="{{$item->bancada}}" data-descripcion="{{$item->descripcion}}"
                                    data-target="#modalEdit"><i class="fa fa-edit"></i> Actualizar</a>
                                <button class="btn badge bg-danger sm" style="color: #fff" id="eliminar" onclick="eliminar('{{ route('eliminar', $item->id) }}'); "><i class="fa fa-ban"></i> Eliminar</button>
                             @else
                                <p>Asignada para votación</p>
                            @endif
                        @endif
                    </td>
                </tr>
            @endforeach
		</tbody>
	</table>
</div>

