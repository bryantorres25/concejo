

<script src="{{asset('js/core/jquery.3.2.1.min.js')}}"></script>
	
 <script>
   $(function() {

   
    $("#form_create").submit(function(event) {
        event.preventDefault();
        swal({
                title: 'Sistema de Votación',
                text: "¿Está seguro de guardar la información?",
                type: 'warning',
                buttons: {
                    confirm: {
                        text: 'Aceptar',
                        className: 'btn btn-success'
                    },
                    cancel: {
                        text: 'Cancelar',
                        className: 'btn btn-danger'
                    }
                }
            }).then((Delete) => {
                if (Delete) {
                    GuardarResultado();
                } else {
                    swal.close();
                }
            });
    });
});

//guardar en el form
const GuardarResultado = () => {
let form = $('#form_create');
    $.ajax({
        data: form.serialize(),
        url: form.attr('action'),
        type: form.attr('method'),
        dataType: 'json',
        success: function(data) {

            if (data.success) {
                swal({
                    title: 'Sistema de Votación',
                    text: data.success,
                    type: 'success',
                    allowOutsideClick: false,
                    buttons: {
                        confirm: {
                            text: 'Aceptar',
                            className: 'btn btn-success'
                        }

                    }
                }).then((Delete) => {
                    if (Delete) {
                        $('#opciones').hide();
                        window.location.href = 'home';
                    } else {
                        window.location.href = 'home';
                    }
                });


            } else {
                warning(data.warning);
            }

        },
        error: function(data) {

            if (data.status === 422) {
                let errors = $.parseJSON(data.responseText);
                addErrorMessage(errors);
            }
        }
    });

}

</script>
<div class="table-responsive">
	<table id="basic-datatables" class="display table table-bordered-bd-default states" >
		<thead>
			<tr>
                <th>N°</th>
                <th>Voto</th>
                <th>Fecha</th>
                <th>Hora</th>								
			</tr>
		</thead>
		<tbody>
            @php
                $aprobado=0;
                $rechazado=0;
                $nombre='';
            @endphp
            @foreach ($resultados as $item)
            @php
                $proyecto_id=$item->proyecto_id;
            @endphp
                <tr>
                    
                    <td>{{ $loop->iteration }}</td> 
                  @if ($item->respuesta==1)
                      <td>APROBADO</td>
                      @php
                      //$nombre=$item->proyecto->descripcion;
                          $aprobado++;
                      @endphp
                  @endif
                  @if ($item->respuesta==0)
                  <td>RECHAZADO</td>
                  @php
                      $rechazado++;
                  @endphp
              @endif                                 
                
                    <th>{{ $item->fecha }}</th>
                    <th>{{ $item->hora }}</th>
                </tr>
            @endforeach						
		</tbody>
    </table><br>
    @php
        $total=$aprobado+$rechazado;
        $porcentaje_aprobado=round(($aprobado/$total)*100, 2);
        $porcentaje_rechazado=round(($rechazado/$total)*100, 2);
        
    @endphp
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5><b>APROBADOS</b></h5>
                            <p class="text-muted">Total votos</p>
                        </div>
                        <h3 class="text-success fw-bold">{{ $aprobado }}</h3>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-success w-25" role="progressbar" aria-valuenow="{{ $aprobado }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class="text-muted mb-0"></p>
                        <p class="text-muted mb-0"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5><b>RECHAZADOS</b></h5>
                            <p class="text-muted">Total Votos</p>
                        </div>
                        <h3 class="text-danger fw-bold">{{ $rechazado }}</h3>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-danger w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class="text-muted mb-0"></p>
                        <p class="text-muted mb-0"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5><b>TOTAL VOTOS</b></h5>
                            <p class="text-muted">Total</p>
                        </div>
                        <h3 class="text-info fw-bold">{{ $total }}</h3>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-info w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class="text-muted mb-0"></p>
                        <p class="text-muted mb-0"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5><b>TOTAL GENERAL</b></h5>
                            <p class="text-muted">Total</p>
                        </div>
                        <h3 class="text-secondary fw-bold"> @php
                            echo max($porcentaje_aprobado, $porcentaje_rechazado);
                        @endphp
                        %</h3>
                    </div>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-secondary w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class="text-muted mb-0"></p>
                        <p class="text-muted mb-0"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
        

   @if(count($validar)==0)
   <form id="form_create" action="{{ route('resultadossecreto.store') }}" method="POST">
    @csrf
    <input type="hidden" name="proyecto_id" value="{{ $proyecto_id }}">
    <input type="hidden" name="rechazado" value="{{ $rechazado }}">
    <input type="hidden" name="aprobado" value="{{ $aprobado }}">
    <button type="submit" class="btn btn-success"> Guardar </button>
</form>
   @endif
    <div id="piechart" style="width: 900px; height: 500px;"></div>
</div>


 
<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['VOTO', 'CANTIDAD'],
        ['APROBADO',  <?php echo $aprobado;?>],
        ['RECHAZADO', <?php echo $rechazado;?>]
        
      ]);

    var options = {
      legend: 'none',
      pieSliceText: 'label',
      title: 'Nombre Proyecto',
      pieStartAngle: 100,
    };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));
      chart.draw(data, options);
    }

   
  </script>
 