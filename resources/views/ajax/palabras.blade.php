<div class="table-responsive">
	<table id="basic-datatables" class="table table-striped table-bordered dt-responsive nowrap"  >
		<thead>
			<tr>
                <th>N°</th>
                <th>Nombre</th>
                <th>Partido</th>
                <th>Opciones</th>
			</tr>
		</thead>
		<tbody>
            @foreach ($palabras as $palabra)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $palabra->nombres.' '. $palabra->apellidos}}</td>


                    <th><img src="logos/{{ $palabra->logo }}" alt="" width="90px" ></th>
                    <td>
                        @if (auth()->user()->persona_id==$palabra->persona_id)
                         <button class="btn badge bg-danger sm" style="color: #fff" id="eliminar" onclick="eliminar('{{ route('eliminarpalabra', $palabra->id) }}'); "><i class="fa fa-ban"></i> Cancelar</button>
                        @endif
                    </td>

                </tr>
                @php
                $total=0;
                    $total=$total+ $loop->iteration ;
                @endphp
            @endforeach
        </tbody>

    </table>
</div>
<script>
    //FUNCION DE ESTADOS
const changeEstado = (url) => {
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function(data) {

            if (data.success) {
                success(data.success);
                updateTable();
            } else {
                warning(data.warning);
            }

        },
    });
}
</script>
