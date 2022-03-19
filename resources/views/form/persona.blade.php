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
                <label>Género</label>
                <div>
                    <select name="genero" id="genero" class="form-control" required>
                        <option value="" selected="selected"> - Seleccione - </option>
                        <option value="MASCULINO">MASCULINO</option>
                        <option value="FEMENINO">FEMENINO</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <label>Telefono</label>
                <input type="text" name="telefono" id="telefono" class="form-control" required />
            </div>
            <div class="col-md-6">
                <label>Direccion</label>
                <input type="text" name="direccion" id="direccion" class="form-control" required />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <label>Correo</label>
                <input type="email" name="correo" id="correo" class="form-control" required data-parsley-type="email"/>
            </div>
            <div class="col-md-6">
                <label>Fecha Nacimiento</label>
                <input type="date" name="fecha_nac" id="fecha_nac" class="form-control" required />
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <label>Cargo</label>
                <div>
                    <select name="cargo_id" id="cargo_id" class="form-control" required>
                        <option value="" selected="selected"> - Seleccione - </option>
                        @foreach ($cargos as $item)
                            <option value="{{ $item->id }}">{{ $item->nombre }}</option>$
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <label>Partido</label>
                <div>
                    <select name="partido_id" id="partido_id" class="form-control" required>
                        <option value="" selected="selected"> - Seleccione - </option>
                        @foreach ($partidos as $item)
                            <option value="{{ $item->id }}">{{ $item->nombre }}</option>$
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <label>Foto</label>
                <div>
                    <input type="file" id="foto"  class="form-control" rows="5" name="foto" required></input>
                </div>
            </div>
            <div class="col-md-6">
                <label>Comisión</label>
                <div>
                    <select name="comision_id" id="comision_id" class="form-control" required>
                        <option value="" selected="selected"> - Seleccione - </option>
                        @foreach ($comisiones as $item)
                            <option value="{{ $item->id }}">{{ $item->nombre }}</option>$
                        @endforeach
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
                <label>Género</label>
                <div>
                    <select name="genero" id="genero_e" class="form-control" required>
                        <option value="" selected="selected"> - Seleccione - </option>
                        <option value="MASCULINO">MASCULINO</option>
                        <option value="FEMENINO">FEMENINO</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <label>Telefono</label>
                <input type="text" name="telefono" id="telefono_e" class="form-control" required />
            </div>
            <div class="col-md-6">
                <label>Direccion</label>
                <input type="text" name="direccion" id="direccion_e" class="form-control" required />
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <label>Correo</label>
                <input type="email" name="correo" id="correo_e" class="form-control" required />
            </div>
            <div class="col-md-6">
                <label>Fecha Nacimiento</label>
                <input type="date" name="fecha_nac" id="fecha_nac_e" class="form-control" required />
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <label>Cargo</label>
                <div>
                    <select name="cargo_id" id="cargo_id" class="form-control">
                        @foreach ($cargos as $item)
                            <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <label>Partido</label>
                <div>
                    <select name="partido_id" id="partido_id" class="form-control">
                        @foreach ($partidos as $item)
                            <option value="{{ $item->id }}">{{ $item->nombre }}</option>$
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <label>Foto</label>
                <div>
                    <input type="file" id="foto_e"  class="form-control" rows="5" name="foto"></input>
                </div>
            </div>
            <div class="col-md-6">
                <label>Comisión</label>
                <div>
                    <select name="comision_id" id="comision_id" class="form-control">
                        @foreach ($comisiones as $item)
                            <option value="{{ $item->id }}">{{ $item->nombre }}</option>$
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
@endif
