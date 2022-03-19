<div id="ModalDebate" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background: #589B4E; color: #fff" >
                <h5 class="modal-title mt-0" id="myLargeModalLabel"> Registro de Datos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{ asset('img/cancelar.png') }}" width="32px" alt=""></button>
            </div>
            <div class="modal-body">
                <form id="form_create" action="{{ route('debates.store') }}" method="POST">
                    @csrf
                   @include('form.debate', ['crear'=>true, 'editar'=>false])   
                 
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

