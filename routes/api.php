<?php

use Illuminate\Http\Request;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('cors')->get('login', 'APILoginController@login');

//Route::post('logout', 'APILoginController@logout');

Route::middleware('jwt.auth')->get('users', function () {
    return auth('api')->user();
    //colocar aqui las rutas seguras
});


Route::middleware('jwt.auth')->get('otes', 'ordentrabajoController@index');

Route::put('otes/query','ordentrabajoController@query');

Route::put('otes/query/limitado','ordentrabajoController@query_limitado');

Route::get('otes/multifiltro/{campo1}/{valor1}/{campo2}/{valor2}/{campo3}/{valor3}','ordentrabajoController@multifiltro');

Route::get('otes/{id}', 'ordentrabajoController@show');

Route::get('otes/count/general', 'ordentrabajoController@otcount');

Route::get('otes/area/{area_id}', 'ordentrabajoController@otesarea');

Route::get('otes/area/count/{area_id}', 'ordentrabajoController@otesarea_count');

Route::get('otes/area/{id_area}/{estado}','ordentrabajoController@ote_area_estado');

Route::get('otes/area/general/{id_area}/{estado}','ordentrabajoController@ote_area_estado_general');

Route::get('otes/estado/general/{estado}','ordentrabajoController@ote_estado_general');

Route::get('otes/area/count/{id_area}/{estado}','ordentrabajoController@ote_area_estado_count');

Route::get('otes/vehiculo/empresa/{id_empresa}', 'ordentrabajoController@ot_empresa');

Route::get('otes/correlativo/{correlativo}', 'ordentrabajoController@findByCorrelativo');

Route::get('otes/operacion/{operacion}', 'ordentrabajoController@ot_operacion');

//Cuenta los requerimientos y actualiza "aprobadas" de ordentrabajo
Route::put('otes/requerimiento/conteo/{id_reque}','ordentrabajoController@conteo');
//Cuenta las tareas y actualiza "progreso_tareas" de ordentrabajo
Route::put('otes/tarea/conteo/{id_tarea}','ordentrabajoController@conteo_tarea');

Route::middleware('jwt.auth')->get('otes/paginacion/general/{limite}','ordentrabajoController@paginacion');

Route::post('otes/crear','ordentrabajoController@store');

Route::put('otes/actualizar/{id}','ordentrabajoController@update');

Route::put('otes/observacion/actualizar/{id}',
	'ordentrabajoController@updateObservacion');

Route::put('otes/estado/actualizar/{id}',
	'ordentrabajoController@updateEstado');

Route::put('otes/fecha/hora/programables/{id}','ordentrabajoController@f_h_programables');
Route::put('otes/fecha/hora/inicio/real/{id}','ordentrabajoController@f_h_inicio_real');
Route::put('otes/fecha/hora/fin/real/{id}','ordentrabajoController@f_h_fin_real');

Route::get('otes/vehiculo/{placa}', 'ordentrabajoController@ot_vehiculo');


Route::delete('otes/eliminar/{id}', 'ordentrabajoController@destroy');



Route::get('reque/{ot_id}', 'requerimientoController@index');

Route::get('reque/find/{id}', 'requerimientoController@show');

Route::post('reque/crear','requerimientoController@store');

Route::put('reque/actualizar/{id}','requerimientoController@update');

Route::put('reque/observacion/actualizar/{id}','requerimientoController@updateObservacion');

Route::delete('reque/eliminar/{id}', 'requerimientoController@destroy');


Route::get('tarea/{ot_id}', 'tareaController@index');

Route::get('tarea/find/{id}', 'tareaController@show');

Route::post('tarea/crear','tareaController@store');

Route::put('tarea/actualizar/{id}','tareaController@update');

Route::put('tarea/observacion/actualizar/{id}','tareaController@updateObservacion');

Route::delete('tarea/eliminar/{id}', 'tareaController@destroy');




Route::get('area', 'areaController@index');

Route::get('area/{id}', 'areaController@show');

Route::put('area/reasignar/{area_id}/{new_encargado_id}','areaController@reasignar_usuario');

Route::get('area/encargado/{id}', 'areaController@encargadoFind');

Route::put('area/actualizar/{id}','areaController@update');

Route::delete('area/eliminar/{id}', 'areaController@destroy');



Route::get('otes/notificacion/fecha/{vehiculo_id}/{area_id}', 'vehiculoController@notificacion');
/*
Route::get('vehiculo', 'vehiculoController@index');

Route::get('vehiculo/{placa}', 'vehiculoController@show');

Route::get('vehiculo/ote/conteo', 'vehiculoController@conteo_ot');

Route::get('vehiculo/ote/{placa}','vehiculoController@ote_placa');

Route::post('vehiculo/crear','vehiculoController@store');

Route::put('vehiculo/actualizar/{placa}','vehiculoController@update');

Route::delete('vehiculo/eliminar/{placa}', 'vehiculoController@destroy');
*/

Route::get('usuario', 'usuarioController@index');

Route::get('usuario/jefearea/listado','usuarioController@find_JefeAreas');

Route::post('usuario/nombre','usuarioController@nombre');//EXTRA

Route::post('usuario/create/general','usuarioController@crear_user_general');

Route::get('usuario/{id}', 'usuarioController@show');

Route::post('usuario/crear','usuarioController@store');

Route::put('usuario/actualizar/{id}','usuarioController@update');

Route::delete('usuario/eliminar/{id}', 'usuarioController@destroy');



Route::get('rol', 'rolController@index');

Route::get('rol/{id}', 'rolController@show');

Route::post('rol/crear','rolController@store');

Route::put('rol/actualizar/{id}','rolController@update');

Route::delete('rol/eliminar/{id}', 'rolController@destroy');


Route::get('solicitud', 'solicitudController@index');

Route::get('solicitud/{id}', 'solicitudController@show');

Route::get('solicitud/ote/{ot_id}','solicitudController@solicitud_ote');

Route::post('solicitud/crear','solicitudController@store');

Route::put('solicitud/actualizar/{id}','solicitudController@update');

Route::delete('solicitud/eliminar/{id}', 'solicitudController@destroy');


Route::get('material', 'materialController@index');

Route::get('material/{id}', 'materialController@show');

Route::post('material/crear','materialController@store');

Route::put('material/actualizar/{id}','materialController@update');

Route::delete('material/eliminar/{id}', 'materialController@destroy');


Route::get('lubricacion', 'lubricacionController@index');

Route::get('lubricacion/{id}', 'lubricacionController@show');

//Route::get('lubricacion/paginacion/id','lubricacionController@paginacion');



/*Route::get('blog', function(){

    $users = User::paginate(5);

    return view('some.view')->withUsers($users);
}*/

	//'crear','lubricacionController@store');

Route::put('lubricacion/actualizar/{id}','lubricacionController@update');

Route::delete('lubricacion/eliminar/{id}', 'lubricacionController@destroy');


Route::get('m_solicitado', 'm_solicitadoController@index');

Route::get('m_solicitado/{id}', 'm_solicitadoController@show');

Route::get('m_solicitado/solicitud/{solicitud_id}','m_solicitadoController@m_solicitados_solicitud');

Route::post('m_solicitado/crear','m_solicitadoController@store');

Route::put('m_solicitado/actualizar/{id}','m_solicitadoController@update');

Route::delete('m_solicitado/eliminar/{id}', 'm_solicitadoController@destroy');



Route::get('empleado', 'empleadoController@index');

Route::get('empleado/{id}', 'empleadoController@show');

Route::get('empleado/area/{area_id}', 'empleadoController@showByArea');

Route::post('empleado/crear','empleadoController@store');

Route::put('empleado/actualizar/{id}','empleadoController@update');

Route::delete('empleado/eliminar/{id}', 'empleadoController@destroy');


Route::get('involucrado', 'involucradoController@index');

Route::get('involucrado/{id}', 'involucradoController@show');

Route::post('involucrado/crear','involucradoController@store');

Route::put('involucrado/actualizar/{id}','involucradoController@update');

Route::delete('involucrado/eliminar/{id}', 'involucradoController@destroy');
