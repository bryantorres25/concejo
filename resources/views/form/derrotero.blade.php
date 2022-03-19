@if($crear)


<div class="form-group">
    <label>Archivo</label>
   <input type="file" name="ruta" id="ruta" class="form-control" required>
    </textarea>
</div>


@endif

@if($editar)

<input type="hidden" name="id" id="id">


<div class="form-group">
    <label>fecha</label>
    <input type="date" name="fecha" id="fecha"  class="form-control" required />
</div>




<div class="form-group">
    <label>Archivo</label>
    <div>
        <input type="file" id="ruta_e" class="form-control" rows="5" name="ruta"></input>
    </div>
</div>

@endif
