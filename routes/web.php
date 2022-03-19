<?php

use Illuminate\Support\Facades\Route;
use phpDocumentor\Reflection\Types\Resource_;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('index');
});


Route::post('/', 'UserController@logout')->name('logout');

Route::get('filtro/asistencias', 'AsistenciaController@filtro')->name('asistencia.filtro');
Route::get('filtro/resultado', 'ResultadoController@filtro')->name('resultado.filtro');
Route::get('filtro/resultadosecreto', 'ResultadoSecretoController@filtro')->name('resultadosecreto.filtro');
Route::get('filtro/asistencias', 'AsistenciaController@filtro')->name('asistencia.filtro');
Route::get('filtro/listado-comisiones', 'ComisionesListadoController@filtro')->name('listado-comisiones.filtro');
Route::get('filtro/bancadas', 'BancadaController@filtro')->name('bancadas.filtro');
Route::get('filtro/palabras', 'PalabraController@filtro')->name('palabras.filtro');
Route::get('filtro/palabras-listado', 'PalabraController@filtrolistado')->name('palabras-listado.filtrolistado');
Route::get('filtro/palabras-listado-secretaria', 'PalabraSecreController@filtrolistadosecre')->name('palabras-listado-secretaria.filtrolistadosecre');
Route::get('filtro/elecciones', 'EleccionController@filtro')->name('elecciones.filtro');
Route::get('filtro/elecciones-grupales', 'EleccionSocialController@filtro')->name('elecciones-grupales.filtro');
Route::get('filtro/resultado-elecciones-unicas', 'ResultadoEleccionUnicaController@filtro')->name('resultado-elecciones-unicas.filtro');
Route::get('filtro/resultado-elecciones-grupales', 'ResultadoEleccionGrupalController@filtro')->name('resultado-elecciones-grupales.filtro');
Route::get('filtro/palabras-cancelar', 'PalabraController@cancelar')->name('palabras-cancelar.cancelar');
Route::get('filtro/resultados-proposiciones', 'ResultadoProposicionController@filtro')->name('resultados-proposiciones.filtro');
Route::get('filtro/resultados-comisiones', 'ResultadoComisionController@filtro')->name('resultados-comisiones.filtro');
Route::get('filtro/listado-comisiones-concejales', 'EleccionComisionConcejalController@filtro')->name('listado-comisiones-concejales.filtro');
Route::get('filtro/planchas', 'PlanchaController@filtro')->name('planchas.filtro');
Route::get('filtro/planchas-secre', 'PlanchaSecreController@filtro')->name('planchas-secre.filtro');




Route::get('resultados', 'ResultadoController@index')->name('resultado.index');
Route::get('resultadossecreto', 'ResultadoSecretoController@index')->name('resultadosecreto.index');
Route::get('comision/select/{id}', 'ComisionesListadoController@getComision');





Route::resource('cargos','CargoController');
Route::resource('partidos','PartidoController');
Route::resource('tipovotaciones','TipoVotacionController');
Route::resource('personas','PersonaController');
Route::resource('asistencias', 'AsistenciaController');
Route::resource('proyectos','ProyectoController');
Route::resource('proyectos-secretos','ProyectoSecretaController');
Route::resource('votaciones','VotacionController');
Route::resource('proyectos-votaciones','ProyectoVotacionController');
Route::resource('proyectos-votaciones-secreta','ProyectoVotacionSecretaController');
Route::resource('proponentes','ProponenteController');
Route::resource('proyectosvisual','VisualizacionProyectoController');
Route::resource('usuarios','UserController');
Route::resource('ordendia','OrdenDiaController');

Route::resource('recursos','RecursoController');
Route::resource('recursosvisual','VisualizacionRecursoController');
Route::resource('carpetas-recursos','CarpetaRecursoController');
Route::resource('derrotero','DerroteroController');
Route::resource('ciudadanos','CiudadanoController');
Route::resource('debates','DebateController');
Route::resource('comisiones','ComisionesController');
Route::resource('listado-comisiones','ComisionesListadoController');
Route::resource('bancadas','BancadaController');
Route::resource('palabras','PalabraController');
Route::resource('elecciones','EleccionController');
Route::resource('tipoelecciones','TipoEleccionController');
Route::resource('aspirantes','AspiranteController');
Route::resource('elecciones-sociales','TipoEleccionSocialController');
Route::resource('aspirantes-grupales','AspiranteGrupalController');
Route::resource('elecciones-grupales','EleccionSocialController');
Route::resource('resultado-elecciones-unicas','ResultadoEleccionUnicaController');
Route::resource('resultado-elecciones-grupales','ResultadoEleccionGrupalController');
Route::resource('orden-dia-show','VisualizacionOrdendiaController');
Route::resource('palabras-listado','PalabraSecreController');
Route::resource('proposiciones','ProposicionController');
Route::resource('proposiciones-votaciones','ProposicionVotacionController');
Route::resource('votaciones-proposiciones','VotacionProposicionController');
Route::resource('concejalusuarios','ConcejalUsuarioCOntroller');
Route::resource('derrotero-show','VisualizacionDerroteroController');
Route::resource('resultados-proposiciones','ResultadoProposicionController');
Route::resource('eleccion-comisiones','EleccionComisionController');
Route::resource('eleccion-comisiones-concejal','EleccionComisionConcejalController');
Route::resource('resultados-comisiones','ResultadoComisionController');
Route::resource('vista-resultados','VistaResultadosController');
Route::resource('planchas','PlanchaController');
Route::resource('hojas-vida','HojaVidaController');
Route::resource('planchas-secre','PlanchaSecreController');




Route::get('resultadosp','VistaResultadosController@resultadop')->name('resultadosp.resultadosp');
Route::get('resultadospro','VistaResultadosController@resultadopro')->name('resultadospro.resultadospro');
Route::get('resultadose','VistaResultadosController@resultadose')->name('resultadose.resultadose');
Route::get('resultadoscom','VistaResultadosController@resultadoscom')->name('resultadoscom.resultadoscom');











Route::post('resultados/store', 'ResultadoController@store')->name('resultado.store');

Route::post('resultadossecreto/store', 'ResultadoSecretoController@store')->name('resultadossecreto.store');




Route::get('cargos/estado/{id}', 'CargoController@change')->name('cargos.status');
Route::get('partidos/estado/{id}', 'PartidoController@change')->name('partidos.status');
Route::get('tipovotaciones/estado/{id}', 'TipoVotacionController@change')->name('tipovotaciones.status');
Route::get('personas/estado/{id}', 'PersonaController@change')->name('personas.status');
Route::get('proyectos/estado/{id}', 'ProyectoController@change')->name('proyectos.status');
Route::get('proyectos-votaciones/estado/{id}', 'ProyectoVotacionController@change')->name('proyectos-votaciones.status');
Route::get('proyectos-votaciones-secreta/estado/{id}', 'ProyectoVotacionSecretaController@change')->name('proyectos-votaciones-secreta.status');

Route::get('proponentes/estado/{id}', 'ProponenteController@change')->name('proponentes.status');
Route::get('proyectos/estado_vista/{id}', 'ProyectoController@changevista')->name('proyectos.vistastatus');

Route::get('proyectos-secreta/estado/{id}', 'ProyectoSecretaController@change')->name('proyectos-secreta.status');

Route::get('proyectos-secreta/estado_vista/{id}', 'ProyectoSecretaController@changevista')->name('proyectos-secreta.vistastatus');


Route::get('usuarios/estado/{id}', 'UserController@change')->name('usuarios.status');
Route::get('orden/estado/{id}', 'OrdenDiaController@change')->name('orden.status');

Route::get('recursos/estado/{id}', 'RecursoController@change')->name('recursos.status');
Route::get('carpetas-recursos/estado/{id}', 'CarpetaRecursoController@change')->name('carpetas-recursos.status');

Route::get('getrecursos/{id}', 'VisualizacionRecursoController@getrecursos')->name('getrecursos');
Route::get('derrotero/estado/{id}', 'DerroteroController@change')->name('derrotero.status');
Route::get('ordendia/estado/{id}', 'OrdenDiaController@change')->name('ordendia.status');
Route::get('ciudadanos/estado/{id}', 'CiudadanoController@change')->name('ciudadanos.status');
Route::get('debates/estado/{id}', 'DebateController@change')->name('debates.status');
Route::get('comisiones/estado/{id}', 'ComisionesController@change')->name('comisiones.status');
Route::get('tipoelecciones/estado/{id}', 'TipoEleccionController@change')->name('tipoelecciones.status');
Route::get('tipoelecciones/estado_vista/{id}', 'TipoEleccionController@changevista')->name('tipoelecciones.vistastatus');
Route::get('aspirantes/estado/{id}', 'AspiranteController@change')->name('aspirantes.status');
Route::get('elecciones-sociales/estado/{id}', 'TipoEleccionSocialController@change')->name('elecciones-sociales.status');
Route::get('elecciones-sociales/estado_vista/{id}', 'TipoEleccionSocialController@changevista')->name('elecciones-sociales.vistastatus');
Route::get('aspirantes-grupales/estado/{id}', 'AspiranteGrupalController@change')->name('aspirantes-grupales.status');
Route::get('proposicion/estado/{id}', 'ProposicionController@change')->name('proposicion.status');
Route::get('palabras/estado/{id}', 'PalabraController@change')->name('palabras.status');
Route::get('eleccion-comisiones/estado/{id}','EleccionComisionController@change')->name('eleccion-comisiones.status');

Route::get('/detalles/{id}', 'EleccionComisionConcejalController@detalles');
Route::get('/eliminarproposicion/{id}','ProposicionController@eliminar')->name('eliminar');
Route::get('/eliminarpalabra/{id}','PalabraController@eliminar')->name('eliminarpalabra');
Route::get('/eliminarordendia/{id}','OrdenDiaController@eliminar')->name('eliminarordendia');
Route::get('/eliminarderrotero/{id}','DerroteroController@eliminar')->name('eliminarderrotero');
Route::get('/eliminarplancha/{id}','EleccionComisionController@eliminar')->name('eliminarplancha');
Route::get('/eliminarproyecto/{id}','ProyectoController@eliminar')->name('eliminarproyecto');
Route::get('/eliminarrecurso/{id}','RecursoController@eliminar')->name('eliminarrecurso');












Route::get('observaciones', 'ObservacionController@index')->name('observaciones.index');
Route::get('votaciones-secreta', 'VotacionController@getViewSecreta')->name('votacion-secreta.index');
Route::get('votaciones-secreta/{id}', 'VotacionController@getShowSecreta')->name('votacion-secreta.show');
Route::post('votaciones-secreta/store', 'VotacionController@storeSecreta')->name('votacion-secreta.store');







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
