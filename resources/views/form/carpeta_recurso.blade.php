@if($crear)
<div class="form-group">
    <label>Nombre</label>
    <input type="text" name="nombre" id="nombre" class="form-control" required placeholder="Nombre"/>
</div>               
               
@endif

@if($editar)
<input type="hidden" id="id" name="id">
<div class="form-group">
    <label>Nombre</label>
    <input type="text" name="nombre" id="nombre_e" class="form-control" required placeholder="Nombre"/>
</div>                             
@endif