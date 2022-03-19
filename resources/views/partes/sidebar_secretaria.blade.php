<div class="sidebar sidebar-style-2">

			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">

					<ul class="nav nav-primary">
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Menú de Opciones</h4>
						</li>
						<li class="nav-item">
							<a href="{{route('home')}}">
								<i class="fas fa-desktop"></i>
								<p>Inicio</p>
							</a>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#personal">
								<i class="fas fa-address-card"></i>
								<p>Personal</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="personal">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{route('cargos.index')}}">
											<span class="sub-item">Cargos</span>
										</a>
									</li>
									<li>
										<a href="{{route('partidos.index')}}">
											<span class="sub-item">Partidos</span>
										</a>
									</li>
									<li>
										<a href="{{route('personas.index')}}">
											<span class="sub-item">Consejales</span>
										</a>
									</li>
									<li>
										<a href="{{route('proponentes.index')}}">
											<span class="sub-item">Proponentes</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						<li class="nav-item">
							<a data-toggle="collapse" href="#proyecto">
								<i class="fas fa-project-diagram"></i>
								<p>Proyectos</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="proyecto">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{route('proyectos.index')}}">
											<span class="sub-item">Proyectos de Acuerdo</span>
										</a>
                                    </li>
                                    <li>
										<a href="{{route('proposiciones-votaciones.index')}}">
											<span class="sub-item">Proposiciones</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#ciudadano">
								<i class="fas fa-user"></i>
								<p>Ciudadanos</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="ciudadano">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{route('ciudadanos.index')}}">
											<span class="sub-item">Inscribir</span>
										</a>
									</li>
									<li>
										<a href="{{route('debates.index')}}">
											<span class="sub-item">Debates</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#config">
								<i class="fas fa-bars"></i>
								<p>Configuraciones del día</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="config">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{route('ordendia.index')}}">
											<span class="sub-item">Orden del día</span>
										</a>
                                    </li>
									<li>
										<a href="{{route('derrotero.index')}}">
											<span class="sub-item">Derrotero</span>
										</a>
									</li>
								</ul>
							</div>
						</li>


						<li class="nav-item">
							<a data-toggle="collapse" href="#votaciones">
								<i class="fas fa-chalkboard-teacher"></i>
								<p>Votaciones</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="votaciones">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{route('tipovotaciones.index')}}">
											<span class="sub-item">Tipo de Votaciones</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#elecc">
								<i class="fas fa-id-card"></i>
								<p>Dignatarios/funcionarios</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="elecc">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{route('tipoelecciones.index')}}">
											<span class="sub-item">Tipo de eleccion</span>
										</a>
									</li>
									<li>
										<a href="{{route('aspirantes.index')}}">
											<span class="sub-item">Aspirantes</span>
										</a>
                                    </li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#eleccgru">
								<i class="fas fa-credit-card"></i>
								<p>Elecciones Comisión</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="eleccgru">
								<ul class="nav nav-collapse">
                                    <li>
										<a href="{{route('elecciones-sociales.index')}}">
											<span class="sub-item">Eleccion Comision</span>
										</a>
									</li>
									<li>
										<a href="{{route('eleccion-comisiones.index')}}">
											<span class="sub-item">Planchas</span>
										</a>
                                    </li>
                                    <li>
										<a href="{{route('planchas-secre.index')}}">
											<span class="sub-item">Detalles Planchas</span>
										</a>
									</li>

								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#result">
								<i class="fas fa-chart-bar"></i>
								<p>Resultados</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="result">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{route('resultado.index')}}">
											<span class="sub-item">Proyectos</span>
										</a>
                                    </li>

									<li>
										<a href="{{route('resultados-proposiciones.index')}}">
											<span class="sub-item">Proposiciones</span>
										</a>
									</li>
									<li>
										<a href="{{route('resultado-elecciones-unicas.index')}}">
											<span class="sub-item">Dignatarios/Funcionarios</span>
										</a>
                                    </li>

									<li>
										<a href="{{route('resultados-comisiones.index')}}">
											<span class="sub-item">Comisiones</span>
										</a>
                                    </li>

								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-folder"></i>
								<p>Carpetas y Recursos</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{route('carpetas-recursos.index')}}">
											<span class="sub-item">Carpetas Recursos</span>
										</a>
									</li>
                                    <li>
										<a href="{{route('recursos.index')}}">
											<span class="sub-item">Recursos</span>
										</a>
									</li>
								</ul>
							</div>
                        </li>
                        <li class="nav-item">
							<a data-toggle="collapse" href="#comi">
								<i class="fas fa-sitemap"></i>
								<p>Comisiones</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="comi">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{route('comisiones.index')}}">
											<span class="sub-item">Comisiones</span>
										</a>
									</li>
                                    <li>
										<a href="{{route('listado-comisiones.index')}}">
											<span class="sub-item">Listado de Comisiones</span>
										</a>
									</li>
								</ul>
							</div>
                        </li>
						<li class="nav-item">
							<a href="{{route('elfinder.index')}}">
								<i class="fas fa-folder-open"></i>
								<p>Archivos y más</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('asistencias.index')}}">
								<i class="fas fa-calendar-check"></i>
								<p>Asistencia</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('usuarios.index')}}">
								<i class="fas fa-users"></i>
								<p>Usuarios</p>
							</a>
                        </li>
                        <li class="nav-item">
							<a href="{{route('bancadas.index')}}">
								<i class="fas fa-user-friends"></i>
								<p>Bancadas</p>
							</a>
						</li>
                        <li class="nav-item">
							<a href="{{route('palabras-listado.index')}}">
								<i class="fas fa-hand-paper"></i>
								<p>Palabra</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
