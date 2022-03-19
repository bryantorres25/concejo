

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
@foreach ($nombre_eleccion as $item)
    <h2 class="text-danger">{{$item->nombre}}</h2>
@endforeach
<div class="row">
    @if ($cantidad>0)
    @php
    $total=0;
    @endphp
        @foreach ($resultados as $resultado)
        <div class="col-12 col-sm-6 col-md-6">
            <div class="card border border-success">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h1><b> <td>{{ $resultado->nombres.' '. $resultado->apellidos}}</td></b></h1>
                        </div>
                        <h3 class="text-success fw-bold"><img src="fotos_aspirantes_grupal/{{$resultado->foto}}" width="80px" alt=""></h3>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class="text-muted mb-0"><h1 class="text-success">Total Votos: {{$resultado->votos}}</h1></p>
                        <p class="text-muted mb-0"></p>
                    </div>
                </div>
            </div>
        </div>
        @php
            $total=$total+$resultado->votos;
       @endphp
        @endforeach
        <div class="col-12 col-sm-6 col-md-6">
            <div class="card border border-success">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h1><b> <td>Total de Votos: {{ $total}}</td></b></h1>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class="text-muted mb-0"></p>
                        <p class="text-muted mb-0"></p>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="justify-content-center"><h3 class="text-default">No hay Votos</h3></div>
    @endif
</div>



 