@extends('plantilla.secretaria')

@section('content')
    <div class="panel-header bg-danger-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">Administración</h2>
				<h5 class="text-white op-7 mb-2">Creación</h5>
			</div>
							
		</div>
	</div>
    </div> 									                             
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
				<div class="card full-height">
					<div class="card-body">
                    <div class="col-md-12">                       
                            <div class="table-responsive">
                             <table class="display table table-bordered-bd states">                        
                                 <tr>
                                     <th>Descripción</th>                                            
                                   
                                     <th></th>                          
                                 </tr>
                                 <tr>
                                     <td>
                                        <div class="form-group">
                                         <textarea  id="descripcion" cols="3" rows="4" class="form-control">

                                         </textarea>
                                        </div>
                                     </td>                           
                                    
                                    <td>
                                        <button id="bt_add" class="btn btn-outline-success "> <i class="fa fa-plus-circle"></i> Agregar</button>
                                <button id="bt_del" class="btn btn-outline-danger "> <i class="fa fa-window-close"></i> Eliminar</button>
                                    </td>
                               
                                 </tr>
                               
                                                             
        
                             </table>
                            </div>                       
                                              
                           
                       
                        <form id="form_create" action="{{ route('ordenes.store') }}" method="POST">
                        @csrf                      
                        <tr>
                            <th>FECHA </th>                           
                        </tr>                        
                        <tr>
                           <td>
                          <div class="form-group">
                            <input type="date" name="fecha"  class="form-control" required>
                          </div>
                         
                        </td>
                        </tr>
                        <div id="content">
                            
                            <br>
                            <table id="tabla" class="display table table-bordered-bd-default states">
                                
                            <thead>
                                <tr>
                                    <th>Nº</th>
                                    <th>Descripcion</th>                                   
                                </tr>
                            </thead>
                        </table>
                        <div class="form-group">
                            <label for="">Asunto del Orden del día</label>
                            <textarea  name="desc" cols="3" rows="4" class="form-control" required>

                            </textarea>
                        </div>
                        <p class="text-center"><button class="btn btn-outline-success" type="submit" id="guardar"><i class="fa fa-saved"></i> Guardar</button></p>
                        </div>
                    </form>
                    
        
						</div>
                    </div>	
                </div>	
            </div>	
        </div>		
    </div>	

	@endsection

	@section('scripts')
	<script>
		
	</script>
	<script src="{{ asset('archivos_js/OrdenDia.js') }}"></script>
	<script src="{{ asset('archivos_js/FilaDinamicas.js') }}"></script>
@endsection