@if ($crear)
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" required />
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Descripción</label>
                    <textarea name="descripcion" id="descripcion" cols="1" rows="2" class="form-control" >
                    </textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Información Extra</label>
                    <textarea name="anexos" id="anexos" cols="1" rows="2" class="form-control">
                    </textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Proponente</label>
                    <div>
                        <select name="proponente_id" id="proponente_id" class="form-control" required>
                            <option value="" selected="selected"> - Seleccione - </option>
                            @foreach ($proponentes as $item)
                                <option value="{{ $item->id }}">{{ $item->nombres . ' ' . $item->apellidos }}</option>$
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Ponente</label>
                    <input type="text" name="ponente" id="ponente" class="form-control" required />
                </div>
            </div>

            <div class="col-md-6">
                <label>Comision</label>
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
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Coponente</label>
                    <input type="text" name="coponente" id="coponente" class="form-control"  />
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Coordinador Ponente</label>
                    <input type="text" name="coordinador" id="coordinador" class="form-control"  />
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Archivo</label>
                    <input type="file" name="ruta" id="ruta" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Estado proyecto</label>
                    <input type="text" name="estado" id="estado" class="form-control" >
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Ponencia Primer Debate</label>
                    <input type="file" name="ponencia_uno" id="ponencia_uno_e" class="form-control" >
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Ponencia Segundo Debate</label>
                    <input type="file" name="ponencia_dos" id="ponencia_dos_e" class="form-control" >
                </div>
            </div>
        </div>
    </div>





@endif

@if ($editar)
    <input type="hidden" name="id" id="id">
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" id="nombre_e" class="form-control" required />
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Descripción</label>
                    <textarea name="descripcion" id="descripcion_e" cols="1" rows="2" class="form-control" >
                    </textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Información Extra</label>
                    <textarea name="anexos" id="anexos_e" cols="1" rows="2" class="form-control">
                    </textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Proponente</label>
                    <div>
                        <select name="proponente_id" id="proponente_id" class="form-control" required>
                            <option value="" selected="selected"> - Seleccione - </option>
                            @foreach ($proponentes as $item)
                                <option value="{{ $item->id }}">{{ $item->nombres . ' ' . $item->apellidos }}</option>$
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Ponente</label>
                    <input type="text" name="ponente" id="ponente_e" class="form-control" required />
                </div>
            </div>

            <div class="col-md-6">
                <label>Comision</label>
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
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Coponente</label>
                    <input type="text" name="coponente" id="coponente_e" class="form-control"  />
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Coordinador Ponente</label>
                    <input type="text" name="coordinador" id="coordinador_e" class="form-control"  />
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Archivo</label>
                    <input type="file" name="ruta" id="ruta_e" class="form-control" >
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Estado proyecto</label>
                    <input type="text" name="estado" id="estado_e" class="form-control" >
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Ponencia Primer Debate</label>
                    <input type="file" name="ponencia_uno" id="ponencia_uno_e" class="form-control" >
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Ponencia Segundo Debate</label>
                    <input type="file" name="ponencia_dos" id="ponencia_dos_e" class="form-control" >
                </div>
            </div>
        </div>
    </div>



@endif
