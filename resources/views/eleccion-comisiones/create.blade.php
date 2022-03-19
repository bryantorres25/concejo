@extends('plantilla.secretaria')

@section('content')
<div class="panel-header" style="background-color: #B43437">

    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>
				<h2 class="text-white pb-2 fw-bold">Administración</h2>
				<h5 class="text-white op-7 mb-2">ELECCIÓN DE COMISIONES</h5>
			</div>

		</div>
	</div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
				<div class="card full-height">
					<div class="card-body">
                    <div class="col-md-12"><br>

                        <form id="form_create" class="form-sample" action="{{route('eleccion-comisiones.store')}}" method="POST">
                            @csrf
                            <input type="hidden" value="{{auth()->user()->id}}" name="id_usuario" id="id_usuario">
                            <div class="form-group">
                                <label>Fecha</label>
                                    <input type="date" name="fecha" id="fecha" class="form-control" required value="@php echo date('Y-m-d') @endphp">
                            </div>
                            <div class="form-group">
                                <label>Nombre de la Plancha</label>
                                         <input type="text" name="nombre" id="nombre" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Postulante</label>
                                <select class="form-control"   name="postulante_id" id="postulante_id">
                                  @foreach($personas as $a)
                                  <option value="{{$a->id}}">{{$a->nombres.' '.$a->apellidos}}</option>
                                  @endforeach
                                </select>
                              </div>



                            <div class="table table-responsive">
                               <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <tr>
                                  <th >Comision</th>
                                  <th>Concejal</th>
                                  <th>Opción</th>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                                      <select class="form-control"   name="comision_id" id="comision_id">
                                                        @foreach($comisiones as $p)
                                                        <option value="{{$p->id}}">{{$p->nombre}}</option>
                                                        @endforeach
                                                      </select>
                                                    </div>
                                    </td>
                                  <td>
                                    <div class="form-group">
                                      <select class="form-control"   name="persona_id" id="persona_id">
                                        @foreach($personas as $a)
                                        <option value="{{$a->id}}">{{$a->nombres.' '.$a->apellidos}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                  </td>


                                  <td>
                                    <div class="form-group">
                                      <button type="button" id="bt_add" class="btn btn-success btn-icon-text">Agregar <i class="icon-plus btn-icon-prepend"></i></button>
                                    </div>
                                  </td>
                                </tr>
                              </table>
                              <table  class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;" id="detalles">
                                <thead style="background: #E0F8F1;">
                                  <th >OPCIONES</th>
                                  <th>CONCEJAL</th>
                                  <th>COMISION</th>
                                </thead>
                                <tfoot>
                                </tfoot>
                              </table>
                            </div><br>

                              <p class="text-center">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <button type="submit" class="btn btn-success btn-icon-text">Guardar Información<i class="icon-check btn-icon-prepend"></i></button>
                              </p>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


	@endsection

    @section('scripts')
    <script src="{{ asset('archivos_js/EleccionComision.js') }}"></script>
	<script >

	</script>

@endsection
