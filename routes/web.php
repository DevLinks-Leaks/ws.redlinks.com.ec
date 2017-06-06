<?php

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
  $cont_pend = App\TarjetaFisica::where('estado','P')->count();
  return view('main',compact('cont_pend'));
});
Route::post('/login','TarjetaHabienteController@login')->middleware('cors');
Route::post('/logout','TarjetaHabienteController@logout')->middleware('cors');
Route::get('/noticias', 'NoticiaController@index');
Route::get('/noticias/{noticia_id}/editar', 'NoticiaController@show');
Route::post('/editar_noticia','NoticiaController@editar_noticia');
Route::get('/eliminar_noticia/{noticia_id}', 'NoticiaController@destroy');
Route::get('/notificaciones', 'NotificacionController@index');
Route::get('/locales/{tipo}', 'EmpresaController@index');
Route::get('/locales/{local_id}/{estado}/cambiarEstado', 'EmpresaController@cambiar_estado_local');
Route::get('/locales/{local_id}/editar', 'EmpresaController@show');
Route::get('/locales/{local_id}/descargar', 'EmpresaController@download');
Route::post('/editar_local','EmpresaController@editar_local_afiliado');
Route::post('/nuevo_local','EmpresaController@agregar_local_afiliado');
Route::get('/sucursales/{local_id}/ver', 'SucursalController@index');
Route::post('/nueva_sucursal', 'SucursalController@store');
Route::post('/editar_sucursal', 'SucursalController@editar_sucursal');
Route::get('/sucursales/{sucursal_id}/{estado}/cambiarEstado', 'SucursalController@cambiar_estado_sucursal');
Route::get('/sucursales/{sucursal_id}/editar', 'SucursalController@show');
Route::get('/beneficios/{local_id}/ver', 'BeneficioController@index');
Route::post('/nuevo_beneficio', 'BeneficioController@store');
Route::get('/eliminar_beneficio/{beneficio_id}', 'BeneficioController@destroy');
Route::post('/soliTarjeta','TarjetaHabienteEmpresaController@store')->middleware('cors');
Route::get('/tarjetas/{estado}', 'TarjetaFisicaController@index');
Route::get('/tarjetas/{id}/{estado}/cambiarEstado', 'TarjetaFisicaController@cambiarEstado');
Route::get('tarjetas/observacion/{id}','TarjetaFisicaController@show');
Route::post('tarjetas/observacion/{id}/save','TarjetaFisicaController@save_obs');

Route::post('/nuevo_afiliado','AfiliadoController@store')->middleware('cors');
Route::post('/nueva_notificacion','NotificacionController@store');
Route::post('/nueva_noticia','NoticiaController@store');
Route::post('/checkin','TarjetaHabienteController@checkin')->middleware('cors');
Route::get('/get_notificaciones','NotificacionController@view')->middleware('cors');
Route::get('/get_visitas/{tarj_hab_id}','TarjetaHabienteController@get_visitas')->middleware('cors');
Route::get('/get_tarjetahabiente/{id}','TarjetaHabienteController@get_tarjetahabiente')->middleware('cors');
Route::get('/get_locales/{categoria_id}','EmpresaController@get_locales')->middleware('cors');
Route::get('/get_categorias','CategoriaController@get_categorias')->middleware('cors');
Route::get('/get_noticias','NoticiaController@get_noticias')->middleware('cors');