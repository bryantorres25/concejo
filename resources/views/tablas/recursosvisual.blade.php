@if ($cantidad>0)
    <div class="row">
        @foreach ($carpetas as $item)
            <div class="col-sm-6 col-md-3">
                <a class="stretched-link text-decoration-none nav-link " href="{{route('getrecursos',$item->id) }}"   aria-haspopup="true" aria-expanded="false">
                    <div class="card card-stats card-round">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <img src="{{asset('img/carpeta1.png')}}" alt="">
                                </div>
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-title">{{ $item->nombre }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@else
    <h2 class="text-danger" style="align-items: center">No hay Carpetas para visualizar</h2>
@endif
