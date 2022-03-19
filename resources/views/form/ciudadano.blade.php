@if ($crear)
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
        </div>
    </div>
@endif

@if ($editar)
    <input type="hidden" id="id" name="id">
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
    </div>

   
@endif
