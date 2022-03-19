@if($crear)
<div class="form-group">
    <div class="row">
        <div class="col-md-6">
            <label>Nombres</label>
            <input type="text" name="nombres" id="nombres" class="form-control" required />
        </div>

        <div class="col-md-6">
            <label>Apellidos</label>
            <input type="text" name="apellidos" id="apellidos" class="form-control" required />
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-md-6">
            <label>Documento</label>
            <input type="number" name="documento" id="documento" class="form-control" required />
        </div>
        <div class="col-md-6">
            <label>Telefono</label>
            <input type="text" name="telefono" id="telefono" class="form-control" required />
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-md-6">
            <label>Direccion</label>
            <input type="text" name="direccion" id="direccion" class="form-control" required />
        </div>
        <div class="col-md-6">
            <label>Eleccion</label>
            <div>
                <select name="eleccionsocial_id" id="eleccionsocial_id" class="form-control" required>
                    <option value="" selected="selected"> - Seleccione - </option>
                    @foreach ($tipoeleccionesgrupal as $item)
                        <option value="{{ $item->id }}">{{ $item->nombre}}</option>$
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>


<div class="form-group">
    <label>Hoja de Vida</label>
   <input type="file" name="ruta" id="ruta" class="form-control" required>
    </textarea>
</div>

<div class="form-group">
    <label>Foto</label>
   <input type="file" name="foto" id="foto" class="form-control" required>
    </textarea>
</div>


@endif

@if($editar)

<input type="hidden" name="id" id="id">
<div class="form-group">
    <div class="row">
        <div class="col-md-6">
            <label>Nombres</label>
            <input type="text" name="nombres" id="nombres_e" class="form-control" required />
        </div>

        <div class="col-md-6">
            <label>Apellidos</label>
            <input type="text" name="apellidos" id="apellidos_e" class="form-control" required />
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-md-6">
            <label>Documento</label>
            <input type="number" name="documento" id="documento_e" class="form-control" required />
        </div>
        <div class="col-md-6">
            <label>Telefono</label>
            <input type="text" name="telefono" id="telefono_e" class="form-control" required />
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-md-6">
            <label>Direccion</label>
            <input type="text" name="direccion" id="direccion_e" class="form-control" required />
        </div>
        <div class="col-md-6">
            <label>Eleccion</label>
            <div>
                <select name="eleccionsocial_id" id="eleccionsocial_id" class="form-control">
                    <option value="0">Seleccione</option>
                    @foreach ($tipoeleccionesgrupal as $item)
                        <option value="{{ $item->id }}">{{ $item->nombre}}</option>$
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>


<div class="form-group">
    <label>Hoja de Vida</label>
   <input type="file" name="ruta" id="ruta_e" class="form-control">
    </textarea>
</div>
<div class="form-group">
    <label>Foto</label>
   <input type="file" name="foto" id="foto" class="form-control">
    </textarea>
</div>

@endif
