
 <style>
     input[type=checkbox]
{
  /* Double-sized Checkboxes */
  -ms-transform: scale(2); /* IE */
  -moz-transform: scale(2); /* FF */
  -webkit-transform: scale(2); /* Safari and Chrome */
  -o-transform: scale(2); /* Opera */
  transform: scale(2);
  padding: 10px;
  background-color: green;
}

/* Might want to wrap a span around your checkbox text */
.checkboxtext
{
  /* Checkbox text */
  font-size: 110%;
  display: inline;
}
 </style>
 <form id="form_create" action="{{ route('elecciones-grupales.store') }}" method="POST">
    @csrf 
@foreach ($nombre_eleccion as $item)
    <h2 class="text-danger">{{$item->nombre}}</h2>
@endforeach
<h2 class="text-success">{{$fecha}}</h2>
<br>

<div class="row">
    @if($cantidadt>0)
    @if ($cantidad>0)
    @if ($cantidad_persona==0)
        @foreach ($aspirantesgrupales as $aspirante)

        <div class="col-12 col-sm-7 col-md-3">
            <div class="card border border-success">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5><b> <td>{{ $aspirante->nombres.' '. $aspirante->apellidos}}</td></b></h5>
                        </div>
                        
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class="text-muted mb-0"><img src="fotos_aspirantes_grupal/{{ $aspirante->foto }}" alt="" width="60px"></p>
                        <p class="text-muted mb-0"><a href="hojas_vida_grupal/{{ $aspirante->hoja_vida}}" target="_blank" class="text-success"><img src="{{asset('img/pdf.png')}}" width="60px" height="60px" alt=""></a></p>
                    </div>
                </div>
                <p class="text-center"><input type="checkbox" name="opciones[]" value="{{ $aspirante->id }}"/></p>
            </div>
              <input type="hidden" value="{{ $aspirante->tipo }}" name="eleccionsocial_id" id="eleccionsocial_id">
              <input type="hidden" value="{{ $aspirante->fecha }}" name="fecha" id="fecha">

           

        </div>
        
        @endforeach
        <br>
        <p class="text-center"><button type="submit" class="btn btn-success">Guardar Votaci??n</button></p>
        @else
            <div class="justify-content-center"><h3 class="text-danger">Ya se registro su voto para esta elecci??n</h3></div>
        @endif
        <input type="hidden" name="persona_id" id="persona_id" value="{{ auth()->user()->persona_id }}">
        <br>
      
    </form>
    @else
        <div class="justify-content-center"><h3 class="text-default">No hay Personas en esta eleccion</h3></div>
    @endif
    @else
    <div class="justify-content-center"><h3 class="text-default">No hay eleccion en esta fecha</h3></div>
@endif
</div>
<script>
    $(function() {
 
    
     $("#form_create").submit(function(event) {
         event.preventDefault();
         swal({
                 title: 'Sistema de Votaci??n',
                 text: "??Est?? seguro de guardar la informaci??n?",
                 type: 'warning',
                 showCancelButton: true,
                 confirmButtonText: 'Aceptar',
                confirmButtonColor: '#589B4E',
                cancelButtonText: 'Cancelar',
                cancelButtonColor:'#B43437',
             }).then((Delete) => {
                 if (Delete) {
                    let form = $('#form_create');
     $.ajax({
         data: form.serialize(),
         url: form.attr('action'),
         type: form.attr('method'),
         dataType: 'json',
         success: function(data) {
 
             if (data.success) {
                 swal({
                     title: 'Sistema de Votaci??n',
                     text: data.success,
                     type: 'success',
                     allowOutsideClick: false,                     
                     confirmButtonColor: '#589B4E',
                     confirmButtonText: 'Aceptar',
                 }).then((Delete) => {
                     if (Delete) {
                         
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
                 } else {
                     swal.close();
                 }
             });
     });
 });
 
 
 </script>