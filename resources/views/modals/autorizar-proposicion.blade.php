<div id="modalAutorizacion" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background: #589B4E; color: #fff">
                <h5 class="modal-title mt-0" id="myLargeModalLabel"> Autorizar Proyecto para Votación</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <div class="modal-body">
                <form id="form_autorizacion" action="{{ route('proposiciones-votaciones.store') }}" method="POST">
                    <input type="hidden" name="id" id="id">
                @csrf
               <div class="form-group">
                <b> NOMBRE: <h3 id="nombre_p"></h3></b>
               </div>

               <div class="form-group">
                <b> BANCADA: <h3 id="bancada"></h3></b>
               </div>
                <div class="form-group">
                    <label for="">Fecha (*) de Votación</label>
                    <input type="date" name="fecha" id="fecha" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="">Hora (*)</label>
                    <input type="time" name="hora" id="hora" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Tiempo Permitido (Min)</label>
                   <input type="number" class="form-control" name="tiempo" id="tiempo" value="30" step="1" min="0" required>
                </div>
                <div class="form-group">
                    <label for="">Tipo Votación</label>
                   <select class="form-control" name="tipovotacion_id" id="tipovotacion_id" required>
                       @foreach ($tipovotaciones as $item)
                           <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                       @endforeach
                   </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-success waves-effect waves-light">
                    <i class="fa fa-save"></i> Guardar
                </button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-window-close"></i> Cerrar</button>
            </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
