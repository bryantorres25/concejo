@if($crear)
<div class="form-group">
    <label>Nombre</label>
    <input type="text" name="nombre" id="nombre" class="form-control" required placeholder="Nombre"/>
</div>
<div class="form-group">
    <label>Tipo de Comision</label>
    <div>
        <select name="tipo" id="tipo" class="form-control" >

                <option value="1">PERMANENTE</option>
                <option value="2">LEGALES</option>

        </select>
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
    <label>Tipo de Comision</label>
    <div>
        <select name="tipo" id="tipo_e" class="form-control" >
                <option value="1">PERMANENTE</option>
                <option value="2">LEGALES</option>

        </select>
    </div>
</div>
@endif
