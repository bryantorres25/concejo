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
            <div class="col-md-6">
                <label>Cargo</label>
                <input type="text" name="cargo" id="cargo" class="form-control" required />
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <label>Email</label>
                <input type="email" name="correo" id="correo" class="form-control"  />
            </div>
            <div class="col-md-6">
                <label>Tipo de proponente</label>
                <div>
                    <select name="tipo" id="tipo" class="form-control">
                     <option value="Natural">Natural</option>
                     <option value="Juridica">Juridica</option>
                    </select>
                </div>
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
            <div class="col-md-6">
                <label>Cargo</label>
                <input type="text" name="cargo" id="cargo_e" class="form-control" required />
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <label>Email</label>
                <input type="email" name="correo" id="correo_e" class="form-control"  />
            </div>
            <div class="col-md-6">
                <label>Tipo de proponente</label>
                <div>
                    <select name="tipo" id="tipo_e" class="form-control">
                     <option value="Natural"">Natural</option>
                     <option value="Juridica"">Juridica</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
@endif
