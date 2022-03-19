@if($crear)
<div class="form-group">
    <label>Nombre</label>
    <input type="text" name="nombre" id="nombre"  class="form-control" required  placeholder="Nombre"/>
</div>               

<div class="form-group">
    <label>Logo</label>
    <div>
        <input type="file" id="logo"  class="form-control" rows="5" name="logo" required></input>
    </div>
</div>                
@endif

@if($editar)
<input type="hidden" id="id" name="id">
<div class="form-group">
    <label>Nombre</label>
    <input type="text" name="nombre" id="nombre_e" class="form-control" required placeholder="Nombre"/>
</div>               

<div class="form-group">
    <label>Logo</label>
    <div>
        <input type="file" id="logo_e" class="form-control" rows="5" required name="logo"></input>
    </div>
</div>                
@endif