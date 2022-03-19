@if($crear)
<div class="form-group">
    <label>Carpeta</label>
    <div>
        <select name="carpeta_recurso_id" id="carpeta_recurso_id" class="form-control" required style="width:700px">
            <option value="" selected="selected"> - Seleccione - </option>
            @foreach ($carpetas as $item)
                <option value="{{ $item->id }}">{{ $item->nombre}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label>Nombre</label>
    <input type="text" name="nombre" id="nombre" class="form-control" required />
</div>



<div class="form-group">
    <label>Link</label>
    <textarea name="link" id="link" cols="1" rows="2" class="form-control">
    </textarea>
</div>

<div class="form-group">
    <label>Archivo</label>
   <input type="file" name="ruta" id="ruta" class="form-control">
    </textarea>
</div>


<div class="form-group">
    <label>Visualizar en Modulo concejo</label>
    <div>
        <select name="estado" id="estado" class="form-control" required>
            <option value="" selected="selected"> - Seleccione - </option>
            <option value="1">Si</option>
            <option value="2">NO</option>
        </select>
    </div>
</div>



@endif

@if($editar)

<input type="hidden" name="id" id="id">
<div class="form-group">
    <label>Carpeta</label>
    <div>
        <select name="carpeta_recurso_id" id="carpeta_recurso_id" class="form-control">
            <option value="0">Seleccione</option>
            @foreach ($carpetas as $item)
                <option value="{{ $item->id }}">{{ $item->nombre}}</option>$
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label>Nombre</label>
    <input type="text" name="nombre" id="nombre_e"  class="form-control" required />
</div>



<div class="form-group">
    <label>Link</label>
    <textarea name="link" id="link_e" cols="1" rows="2" class="form-control">
    </textarea>
</div>

<div class="form-group">
    <label>Archivo</label>
    <div>
        <input type="file" id="ruta_e" class="form-control" rows="5" name="ruta"></input>
    </div>
</div>


<div class="form-group">
    <label>Visualizar en Modulo consejo</label>
    <div>
        <select name="estado" id="estado_e" class="form-control">
            <option value="0">Seleccione</option>
            <option value="1">Si</option>
            <option value="2">No</option>
        </select>
    </div>
</div>


@endif
