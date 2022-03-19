<div class="table-responsive">
	<table id="basic-datatables" class="table table-striped table-bordered dt-responsive nowrap"  >
		<thead>
			<tr>
                <th>N°</th>
                <th>Nombre</th>
                <th>Partido</th>
			</tr>
		</thead>
		<tbody>
            @foreach ($palabras as $palabra)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $palabra->nombres.' '. $palabra->apellidos}}</td>

                    <th><img src="logos/{{ $palabra->logo }}" alt="" width="90px" ></th>
                </tr>
                @php
                $total=0;
                    $total=$total+ $loop->iteration ;
                @endphp
            @endforeach
        </tbody>

    </table>
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