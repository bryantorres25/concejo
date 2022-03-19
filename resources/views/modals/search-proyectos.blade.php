<div id="ModalSearch" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background: #009300; color: #fff" >
                <h5 class="modal-title mt-0" id="myLargeModalLabel"> Detalle de Proyectos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="{{ asset('img/cancelar.png') }}" width="32px" alt=""></button>
            </div>
            <div class="modal-body">
               <table id="basic-datatables" class="table table-striped table-bordered dt-responsive nowrap" >
                   <tr>
                       <td>N°</td>
                       <th>PROYECTO</th>
                       <td>OPCION</td>
                   </tr>
                   @foreach ($proyectos as $item)
                       <tr>
                           <td>{{ $loop->iteration }}</td>
                           <td>{{ $item->proyecto->descripcion }}</td>
                           <td>
                               <button type="button" class="btn btn-info btn-sm">Seleccionar</button>
                           </td>
                       </tr>
                   @endforeach
                </table>  
                 
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