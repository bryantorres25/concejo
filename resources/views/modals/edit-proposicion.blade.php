<div id="modalEdit" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background: #FFAD46; color: #000" >
                <h3 class="modal-title mt-0" id="myLargeModalLabel"> Actualización de Datos</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{ asset('img/cancelar.png') }}" width="32px" alt=""></button>
            </div>
            <div class="modal-body">
                <form id="form_edit" name="form_edit" action="{{ route('proposiciones.update', 'proposiciones') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    @include('form.proposicion', ['crear'=>false, 'editar'=>true])
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
