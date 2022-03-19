@if ($cantidad > 0)
    <div id="modalInicio" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" >
                    <img src="{{ asset('img/bg.png')}}" width="780" >
                </div>
                <div class="modal-body">
                    <h1 class="text-danger">Deseemosle un feliz cumpleaños a nuestros compañeros!</h1>
                    <div class="row">
                        <div class="col-md-8">
                            @foreach ($cumple as $item)
                                <div class="card card-success">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <p><h2 class="text-white">{{ $item->nombres . ' ' . $item->apellidos }}</h2></p>
                                                
                                            </div>
                                            <img src="fotos/{{ $item->foto }}" alt="" width="64px">
                                        </div>
                        
                                        <div class="d-flex justify-content-between mt-2">
                                            <p class="text-muted mb-0"></p>
                                            <p class="text-muted mb-0"></p>
                                        </div>
                                    </div>
                                </div>
                            
                               
                                
                            @endforeach
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('img/cumple.png') }}"  width="250px">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i
                            class="fa fa-window-close"></i> Cerrar</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


@else

@endif
