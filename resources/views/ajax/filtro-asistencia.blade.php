<div class="table-responsive">
	<table id="basic-datatables" class="table table-striped table-bordered dt-responsive nowrap"  >
		<thead>
			<tr>
                <th>N°</th>
                <th>Fecha</th>
                <th>Asistente</th>
                <th>Partido</th>
                <th>Logo</th>
                <th>Hora de acceso</th>
			</tr>
		</thead>
		<tbody>
            @foreach ($asistencias as $asistencia)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $asistencia->fecha }}</td>
                    <td>{{ $asistencia->apellidos.' '.$asistencia->nombres}}</td>
                    <th>{{ $asistencia->nombre }}</th>

                    <th><img src="logos/{{ $asistencia->logo }}" alt="" width="90px" ></th>

                    <th>{{ $asistencia->hora }}</th>
                </tr>
                @php
                $total=0;
                    $total=$total+ $loop->iteration ;
                @endphp
            @endforeach
        </tbody>

    </table>
</div><br>
<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5><b>TOTAL ASISTENTES</b></h5>
                        <p class="text-muted">Total</p>
                    </div>
                    <h3 class="text-success fw-bold">{{ $total }}</h3>
                </div>

                <div class="d-flex justify-content-between mt-2">
                    <p class="text-muted mb-0"></p>
                    <p class="text-muted mb-0"></p>
                </div>
            </div>
        </div>
    </div>

</div>
<script >
    $(document).ready(function() {
        $('#basic-datatables').DataTable({
            language: {
    "decimal": "",
    "emptyTable": "No hay información",
    "info": "Mostrando _START_ a _END_ de _TOTAL_ Registros",
    "infoEmpty": "Mostrando 0 to 0 of 0 Registros",
    "infoFiltered": "(Filtrado de _MAX_ total registros)",
    "infoPostFix": "",
    "thousands": ",",
    "lengthMenu": "Mostrar _MENU_ Registros",
    "loadingRecords": "Cargando...",
    "processing": "Procesando...",
    "search": "Buscar:",
    "zeroRecords": "No se encontraron resultados",
    "paginate": {
        "first": "Primero",
        "last": "Ultimo",
        "next": "Siguiente",
        "previous": "Anterior"
    }
},
        });


        // Add Row
        $('#add-row').DataTable({
            "pageLength": 5,
        });

        var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $('#addRowButton').click(function() {
            $('#add-row').dataTable().fnAddData([
                $("#addName").val(),
                $("#addPosition").val(),
                $("#addOffice").val(),
                action
                ]);
            $('#addRowModal').modal('hide');

        });

    });


</script>
