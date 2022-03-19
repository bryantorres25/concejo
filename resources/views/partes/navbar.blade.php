<!-- Logo Header -->
<div class="logo-header" style="background: #fff">
				
				<a href="" class="logo">
					<img src="{{ asset('img/logo.png') }}" alt="navbar brand" class="navbar-brand" width="140px">
				</a>
				<button   class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon" >
						<i class="icon-menu"style="color: #589B4E"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"style="color: #589B4E"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-succees toggle-sidebar">
						<i class="icon-menu"style="color: #589B4E"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" style="background: #589B4E">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						
						
						@php
													$id=auth()->user()->id;
													$persona=DB::table('usuarios as u')
													->join('personas as p','u.persona_id','=','p.id')
													->select('p.nombres','p.apellidos','p.foto')
													->where('u.id','=',$id)->get();
												@endphp
												
												@foreach ($persona as $item)
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="fotos/{{ $item->foto }}" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="u-text">
												
												<h4>{{ $item->nombres.' '.$item->apellidos }}</h4>
												<!--<a href="" class="btn btn-xs btn-success btn-sm">Mi Cuenta</a>!-->
												@endforeach
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
						
										<form id="logout-form" action="{{route('logout')}}" method="POST">
											@csrf						
											<a id="btn-salir" class="dropdown-item text-danger"  >  <i class="fa fa-window-close text-danger"></i> </i> Cerrar Sesión</a>					
										</form>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->