@if($crear)
<div class="form-group">
    <label>Nombre</label>
    <input type="text" name="nombre" id="nombre" class="form-control" required />
</div>

<div class="form-group">
    <label>Objeto de Petición</label>
   <textarea name="descripcion" id="descripcion" cols="1" rows="2" class="form-control" required>

   </textarea>
</div>

<div class="form-group">
    <label>Ciudadano</label>
    <div>
        <select name="ciudadano_id" id="ciudadano_id" class="form-control" required style="width:750px height:30px" >
            <option value="" selected="selected"> -- Seleccione -- </option>
            @foreach ($ciudadanos as $item)
                <option value="{{ $item->id }}">{{ $item->nombres.' '.$item->apellidos }}</option>$
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label>Fecha Recibido</label>
   <input type="date" name="fecha_recibido" id="fecha_recibido" class="form-control" required>
    </textarea>
</div>
<div class="form-group">
    <label>Fecha Limite</label>
   <input type="date" name="fecha_limite" id="fecha_limite" class="form-control" required>
    </textarea>
</div>



@endif

@if($editar)
<input type="hidden" name="id" id="id">
<div class="form-group">
    <label>Nombre</label>
    <input type="text" name="nombre" id="nombre_e" class="form-control" required />
</div>

<div class="form-group">
    <label>Objeto de Petición</label>
   <textarea name="descripcion" id="descripcion_e" cols="1" rows="2" class="form-control" required>

   </textarea>
</div>

<div class="form-group">
    <label>Ciudadano</label>
    <div>
        <select name="ciudadano_id" id="ciudadano_id" class="form-control select2" style="width:750px height:30px" >
            @foreach ($ciudadanos as $item)
                <option value="{{ $item->id }}">{{ $item->nombres.' '.$item->apellidos }}</option>$
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label>Fecha Recibido</label>
   <input type="date" name="fecha_recibido" id="fecha_recibido_e" class="form-control" required>
    </textarea>
</div>
<div class="form-group">
    <label>Fecha Limite</label>
   <input type="date" name="fecha_limite" id="fecha_limite_e" class="form-control" required>
    </textarea>
</div>




@endif
