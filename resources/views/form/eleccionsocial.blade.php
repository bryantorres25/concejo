@if($crear)
<div class="form-group">
    <label>Nombre</label>
    <input type="text" name="nombre" id="nombre" class="form-control" required />
</div>
<div class="form-group">
    <label>Fecha de elección</label>
    <input type="date" name="fecha" id="fecha_e" class="form-control" required />
</div>
<div class="form-group">
    <label>Tipo de Votación</label>
    <div>
        <select name="tipovotacion_id" id="tipovotacion_id" class="form-control" required>
            <option value="" selected="selected"> - Seleccione - </option>
            @foreach ($tipovotaciones as $item)
                <option value="{{ $item->id }}">{{ $item->nombre}}</option>
            @endforeach
        </select>
    </div>
</div>

@endif

@if($editar)
<input type="hidden" id="id" name="id">
<div class="form-group">
    <label>Nombre</label>
    <input type="text" name="nombre" id="nombre_e" class="form-control" required />
</div>
<div class="form-group">
    <label>Fecha de elección</label>
    <input type="date" name="fecha" id="fecha_e" class="form-control" required />
</div>
<div class="form-group">
    <label>Tipo de Votación</label>
    <div>
        <select name="tipovotacion_id" id="tipovotacion_id" class="form-control" required>
            <option value="" selected="selected"> - Seleccione - </option>
            @foreach ($tipovotaciones as $item)
                <option value="{{ $item->id }}">{{ $item->nombre}}</option>
            @endforeach
        </select>
    </div>
</div>

@endif
