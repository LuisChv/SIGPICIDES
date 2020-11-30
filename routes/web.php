<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
    return redirect('login');
});

Auth::routes();
//       Todo lo relacionado al usuario laravel (confirmacion de cuenta, reestablecer contraseña, ect)

//E-mail Verificaction
Route::get('register/verify/{code}', 'Auth\VerificationController@verificar')->name('verificacion_email');

//ReenviarEmail
Route::get('resend/verify', 'Auth\VerificationController@reenviar')->name('reenviar_verificacion');

//Email restablecer password
Route::post('password/restablecer', 'Auth\ForgotPasswordController@enviar')->name('password_reset.email');

//Guardar password
Route::put('password/restablecer/{token}', 'Auth\ResetPasswordController@update')->name('password_reset.update');

//formulario restablecer password
Route::get('password/restablecer/{token}/{email}', 'Auth\ResetPasswordController@formulario')->name('password_reset.form');




//---------fin

Route::get('home/', 'HomeController@index')->name('home')->middleware(['auth', 'has.permission:validacion']);
//<a href="{{route('routename', párametros)}}"

//Routes de Icons, Maps, notificaciones ........
Route::group(['middleware' => ['auth', 'has.permission:validacion']], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'PageController@upgrade']);
        Route::get('registro', ['as' => 'solicitud.registro', 'uses' => 'PageController@registro']);
        Route::get('consultarSolicitudes', ['as' => 'solicitud.consultar', 'uses' => 'PageController@consultarSolicitudes']);
        Route::get('cides', ['as' => 'cides', 'uses' => 'PageController@cides']);
});
//Routes de Perfil de usuario
Route::group(['middleware' => ['auth', 'has.permission:validacion']], function () {
	//Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

//Routes 
Route::middleware(['auth', 'has.permission:validacion'])->group(function(){    
    //Roles
    Route::post('roles/store', 'RoleController@store')->name('roles.store')
    ->middleware('has.permission:roles.create');

    Route::get('roles', 'RoleController@index')->name('roles.index')
    ->middleware('has.permission:roles.index');

    Route::get('roles/create', 'RoleController@create')->name('roles.create')
    ->middleware('has.permission:roles.create');

    Route::put('roles/{role}', 'RoleController@update')->name('roles.update')
    ->middleware('has.permission:roles.edit');

    Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
    ->middleware('has.permission:roles.show');

    Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
    ->middleware('has.permission:roles.destroy');

    Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
    ->middleware('has.permission:roles.edit');


    //PermisoRol
    Route::post('role_permissions/', 'PermissionRoleController@store')->name('role_permission.store')
    ->middleware('has.permission:permission_role.create');

    Route::get('role_permissions/{role}', 'PermissionRoleController@index')->name('roles.permissions')
    ->middleware('has.permission:permission_role.index');

    Route::delete('role_permissions/', 'PermissionRoleController@destroy')->name('role_permission.destroy')
    ->middleware('has.permission:permission_role.destroy');

    //Users
    Route::post('users/store', 'UserController@store')->name('users.store')
    ->middleware('has.permission:users.create');
    //panel de control
    Route::get('users/control', 'UserController@indexPanel')->name('users.control')
    ->middleware('has.permission:users.index');

    Route::get('users', 'UserController@index')->name('users.index')
    ->middleware('has.permission:users.index');

    Route::get('users/create', 'UserController@create')->name('users.create')
    ->middleware('has.permission:users.create');

    Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
    ->middleware('has.permission:users.edit');

    Route::put('users/{user}', 'UserController@update')->name('users.update')
    ->middleware('has.permission:users.edit');

    Route::get('users/{user}', 'UserController@show')->name('users.show')
    ->middleware('has.permission:users.show');

    Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')
    ->middleware('has.permission:users.destroy');

    Route::put('dark/{user}', 'UserController@dark')->name('users.dark');


    //Proyectos
    Route::post('proyectos/store', 'ProyectoController@store')->name('proyectos.store')
    ->middleware('has.permission:proyectos.create');

    Route::get('proyectos', 'ProyectoController@index')->name('proyectos.index')
    ->middleware('has.permission:proyectos.index');

    Route::get('mis_proyectos', 'ProyectoController@misProyectos')->name('mis_proyectos.index');

    //Lista de colaboraciones
    Route::get('proyectos/colaboraciones', 'ProyectoController@indexColaboracion')->name('proyectos.colaboracion');
    

    Route::get('proyectos/create', 'ProyectoController@create')->name('proyectos.create')
    ->middleware('has.permission:proyectos.create');

    Route::put('proyectos/{proyecto}', 'ProyectoController@update')->name('proyectos.update')
    ->middleware('has.permission:proyectos.edit');

    Route::get('proyectos/{proyecto}', 'ProyectoController@show')->name('proyectos.show')
    ->middleware('has.permission:proyectos.show');

    Route::delete('proyectos/{proyecto}', 'ProyectoController@destroy')->name('proyectos.destroy')
    ->middleware('has.permission:proyectos.destroy');

    Route::get('proyectos/{proyecto}/edit', 'ProyectoController@edit')->name('proyectos.edit')
    ->middleware('has.permission:proyectos.edit');
    
    //Recursos

    Route::get('recursos', 'RecursoController@index')->name('recursos.index')
    ->middleware('has.permission:recursos.index');

    Route::post('recursos', 'RecursoController@store')->name('recursos.store')
    ->middleware('has.permission:recursos.create');  

    Route::get('recursos/create', 'RecursoController@create')->name('recursos.create')
    ->middleware('has.permission:recursos.create');

    Route::get('recursos/{proyecto}', 'RecursoController@show')->name('recursos.show')
    ->middleware('has.permission:recursos.show');    

    Route::delete('recursos/{proyecto}', 'RecursoController@destroy')->name('recursos.destroy')
    ->middleware('has.permission:recursos.destroy');

    Route::get('recursos/{proyecto}/edit', 'RecursoController@edit')->name('recursos.edit')
    ->middleware('has.permission:recursos.edit');

    Route::put('recursos/{proyecto}', 'RecursoController@update')->name('recursos.update')
    ->middleware('has.permission:recursos.edit');

     //Equipo Investigacion

    Route::get('equipos', 'EquipoController@index')->name('equipos.index')
    ->middleware('has.permission:equipo_de_investigacion.index');

    Route::post('equipos/store', 'EquipoController@store')->name('equipos.store')
    ->middleware('has.permission:equipo_de_investigacion.create');  

    Route::get('equipos/create', 'EquipoController@create')->name('equipos.create')
    ->middleware('has.permission:equipo_de_investigacion.create');

    Route::get('equipos/{equipo}', 'EquipoController@show')->name('equipos.show')
    ->middleware('has.permission:equipo_de_investigacion.show');    

    Route::delete('equipos/{equipo}', 'EquipoController@destroy')->name('equipos.destroy')
    ->middleware('has.permission:equipo_de_investigacion.destroy');

    Route::get('equipos/{equipo}/edit', 'EquipoController@edit')->name('equipos.edit')
    ->middleware('has.permission:equipo_de_investigacion.edit');

    Route::put('equipos/{equipo}', 'EquipoController@update')->name('equipos.update')
    ->middleware('has.permission:equipo_de_investigacion.edit');

     //UMiembros de equipo de investigacion

    Route::get('miembros/{id}', 'UsuarioEquipoRolController@index')->name('miembros.index')
    ->middleware('has.permission:usuario_equipo_rol.index');

    Route::post('miembros/store/{id}', 'UsuarioEquipoRolController@store')->name('miembros.store')
    ->middleware('has.permission:usuario_equipo_rol.create'); 

    Route::get('miembros/create', 'UsuarioEquipoRolController@create')->name('miembros.create')
    ->middleware('has.permission:usuario_equipo_rol.create');

    Route::get('miembros/{miembro}', 'UsuarioEquipoRolController@show')->name('miembros.show')
    ->middleware('has.permission:usuario_equipo_rol.show');    

    Route::delete('miembros/{miembro}/{id}', 'UsuarioEquipoRolController@destroy')->name('miembros.destroy')
    ->middleware('has.permission:usuario_equipo_rol.destroy');

    Route::get('miembros/{miembro}/edit', 'UsuarioEquipoRolController@edit')->name('miembros.edit')
    ->middleware('has.permission:usuario_equipo_rol.edit');

    Route::put('miembros/{equipo}', 'UsuarioEquipoRolController@update')->name('miembros.update')
    ->middleware('has.permission:usuario_equipo_rol.edit');

    //Miembros de Comite de evaluacion

    Route::get('comite/{id}', 'ComiteController@index')->name('comite.index')
    ->middleware('has.permission:comite_de_evaluacion.index');

    Route::post('comite/store/{id}', 'ComiteController@store')->name('comite.store')
    ->middleware('has.permission:comite_de_evaluacion.create'); 

    Route::get('comite/create', 'ComiteController@create')->name('comite.create')
    ->middleware('has.permission:comite_de_evaluacion..create');

    Route::get('comite/{miembro}', 'ComiteController@show')->name('comite.show')
    ->middleware('has.permission:comite_de_evaluacion.show');    

    Route::delete('comite/{miembro}/{id}', 'ComiteController@destroy')->name('comite.destroy')
    ->middleware('has.permission:comite_de_evaluacion.destroy');

    Route::get('comite/{miembro}/edit', 'ComiteController@edit')->name('comite.edit')
    ->middleware('has.permission:comite_de_evaluacion.edit');

    Route::put('comite/{miembro}', 'ComiteController@update')->name('comite.update')
    ->middleware('has.permission:comite_de_evaluacion.edit');



    //Tipo de investigacion
    Route::get('tipo_investigacion', 'TipoInvestigacionController@index')->name('tipo_investigacion.index')
    ->middleware('has.permission:tipo_de_investigacion.index');

    Route::post('tipo_investigacion', 'TipoInvestigacionController@store')->name('tipo_investigacion.store')
    ->middleware('has.permission:tipo_de_investigacion.create');    

    Route::get('tipo_investigacion/create', 'TipoInvestigacionController@create')->name('tipo_investigacion.create')
    ->middleware('has.permission:tipo_de_investigacion.create');
    
    //Route::get('tipo_investigacion/{proyecto}', 'TipoInvestigacionController@show')->name('tipo_investigacion.show')
    //->middleware('has.permission:tipo_de_investigacion.show');

    Route::get('tipo_investigacion/{proyecto}/edit', 'TipoInvestigacionController@edit')->name('tipo_investigacion.edit')
    ->middleware('has.permission:tipo_de_investigacion.edit');

    Route::put('tipo_investigacion/{proyecto}', 'TipoInvestigacionController@update')->name('tipo_investigacion.update')
    ->middleware('has.permission:tipo_de_investigacion.edit');    

    Route::delete('tipo_investigacion/{proyecto}', 'TipoInvestigacionController@destroy')->name('tipo_investigacion.destroy')
    ->middleware('has.permission:tipo_de_investigacion.destroy');

    //Subtipo de investigacion
    //index
    //Route::get('subtipo_investigacion/create', 'SubTipoInvestigacionController@create')->name('subtipo_investigacion.create')
    //->middleware('has.permission:sub_tipo_de_investigacion.index');

    Route::post('subtipo_investigacion', 'SubTipoInvestigacionController@store')->name('subtipo_investigacion.store')
    ->middleware('has.permission:sub_tipo_de_investigacion.create');

    Route::get('subtipo_investigacion/create', 'SubTipoInvestigacionController@create')->name('subtipo_investigacion.create')
    ->middleware('has.permission:sub_tipo_de_investigacion.create');    
    //Show
    //Route::get('subtipo_investigacion/create', 'SubTipoInvestigacionController@create')->name('subtipo_investigacion.create')
    //->middleware('has.permission:sub_tipo_de_investigacion.show');

    Route::get('subtipo_investigacion/{subtipo}/edit', 'SubTipoInvestigacionController@edit')->name('subtipo_investigacion.edit')
    ->middleware('has.permission:sub_tipo_de_investigacionn.edit');

    Route::put('subtipo_investigacion/{subtipo}', 'SubTipoInvestigacionController@update')->name('subtipo_investigacion.update')
    ->middleware('has.permission:sub_tipo_de_investigacionn.edit');

    Route::delete('subtipo_investigacion/{subtipo}', 'SubTipoInvestigacionController@destroy')->name('subtipo_investigacion.destroy')
    ->middleware('has.permission:sub_tipo_de_investigacion.destroy');

    //Permisos
    //index

    Route::get('user/permissions/{user}', 'PermissionController@index')->name('permission.index')
    ->middleware('has.permission:permission.index');

    Route::post('user/permissions/', 'PermissionController@store')->name('permission.store')
    ->middleware('has.permission:permission_user.create');

    Route::delete('user/permissions/', 'PermissionController@destroy')->name('permission.destroy')
    ->middleware('has.permission:permission_user.destroy');

    /**********************solicitud de proyecto Investigador******************/
    Route::post('solicitud', 'SolicitudController@store')->name('solicitud.store')
    ->middleware('has.permission:solicitudes.create');

    Route::get('solicitudes', 'SolicitudController@index')->name('solicitud.index')
    ->middleware('has.permission:solicitudes.index');

    Route::get('solicitud/create', 'SolicitudController@create')->name('solicitud.create')
    ->middleware('has.permission:solicitudes.create');    

    Route::post('solicitud/{solicitud}', 'SolicitudController@show')->name('solicitud.show')
    ->middleware('has.permission:solicitudes.create');

    Route::delete('solicitud/{solicitud}', 'SolicitudController@destroy')->name('solicitud.destroy')
    ->middleware('has.permission:solicitudes.destroy');

    Route::get('solicitud/{solicitud}/edit', 'SolicitudController@edit')->name('solicitud.edit')
    ->middleware('has.permission:solicitudes.create');

    Route::put('solicitud/{solicitud}', 'SolicitudController@update')->name('solicitud.update')
    ->middleware('has.permission:solicitudes.create');

    Route::get('mis_solicitudes', 'SolicitudController@mis_solicitudes')->name('solicitud.mis_solicitudes')
    ->middleware('has.permission:mis_solicitudes');

    Route::get('mis_solicitudes_comite', 'SolicitudController@mis_solicitudes_comite')->name('solicitud.mis_solicitudes_comite');

    Route::get('proyecto/oai/{id}', 'SolicitudController@oai')->name('proyecto.oai')
    ->middleware('has.permission:solicitudes.create');

    Route::get('solicitud/{solicitud}/pre', 'SolicitudController@pre')->name('solicitud.pre')
    ->middleware('has.permission:solicitudes.create');

    Route::post('solicitud/{id}/enviar', 'SolicitudController@enviar')->name('solicitud.enviar')
    ->middleware('has.permission:solicitudes.create');

    Route::post('solicitud/{id}/enviar2', 'SolicitudController@enviar2')->name('solicitud.enviar2')
    ->middleware('has.permission:solicitudes.create');

    Route::get('solicitud/{solicitud}/resumen', 'SolicitudController@resumen')->name('solicitud.resumen')
    ->middleware('has.permission:solicitudes.create');

    Route::get('solicitud/{solicitud}/pre2', 'SolicitudController@pre2')->name('solicitud.pre2')
    ->middleware('has.permission:solicitudes.create');


    /**********************Recursos por solicitud de proyecto Investigador******************/

    Route::get('proyecto/recursos/{id}', 'RecursoProyectoController@create')->name('proyecto_recursos.create')
    ->middleware('has.permission:solicitudes.create');

    Route::post('proyecto/recursos', 'RecursoProyectoController@store')->name('proyecto_recursos.store')
    ->middleware('has.permission:solicitudes.create');

    Route::get('proyecto/recursos/show/{id}', 'RecursoProyectoController@show')->name('proyecto_recursos.show')
    ->middleware('has.permission:solicitudes.create');

    Route::delete('proyecto/recursos/{id}', 'RecursoProyectoController@destroy')->name('proyecto_recursos.destroy')
    ->middleware('has.permission:solicitudes.create');

    
    /**********************Objetivos******************/

    Route::post('proyecto/objetivos', 'ObjetivoController@store')->name('proyecto_objetivos.store')
    ->middleware('has.permission:solicitudes.create');

    Route::put('proyecto/objetivos_update', 'ObjetivoController@update')->name('proyecto_objetivos.update')
    ->middleware('has.permission:solicitudes.create');

    Route::delete('proyecto/objetivos', 'ObjetivoController@destroy')->name('proyecto_objetivos.destroy')
    ->middleware('has.permission:solicitudes.create');


    /**********************Alcances******************/

    Route::post('proyecto/alcances', 'AlcanceController@store')->name('proyecto_alcances.store')
    ->middleware('has.permission:solicitudes.index');

    Route::put('proyecto/alcances_update', 'AlcanceController@update')->name('proyecto_alcances.update')
    ->middleware('has.permission:solicitudes.index');

    Route::delete('proyecto/alcances', 'AlcanceController@destroy')->name('proyecto_alcances.destroy')
    ->middleware('has.permission:solicitudes.index');

    /*********************Solicitude de proyecto Admin*******************/
    
    Route::get('solicitudes', 'SolicitudController@index')->name('solicitud.index')
    ->middleware('has.permission:solicitudes.index');

    Route::post('solicitud/{solicitud}', 'SolicitudController@show')->name('solicitud.show')
    ->middleware('has.permission:solicitudes.create');

    /**********************Solicitud de proyecto Coordinador******************/

    Route::get('solicitudes_evaluadas', 'SolicitudController@solicitudes_evaluadas')->name('solicitud.evaluadas')
    ->middleware('has.permission:solicitudes.index');
    
    Route::get('solicitudes_revisadas', 'SolicitudController@solicitudes_revisadas')->name('solicitud.revisadas')
    ->middleware('has.permission:solicitudes.index');
    
    //proyecto-equipo
    Route::get('equipo', 'EquipoController@index')->name('equipo.index')
    ->middleware('has.permission:equipos.index');

    //enviar emails
    Route::get('email', function () {
        return view ('Mail.mailprueba');
    });
    
    Route::post('email', function (Request $request) {        
        //dd(request()->valor1);
        //dd(auth()->user());
        //$data = array('email'=> request('email'));

        // Mail::send('Mail.plantilla', $data, function ($message) {
        //     //$message->from('a@gmail.com','Hola');
        //     //$message->sender('alejandro.10martimez@gmail.com');
        //     //$message->to('alejandro@mailinator.com', 'maili');
        //     $message->to(request('email'));
        //     $message->subject('Hello there');
        // });
        $consula= DB::table('solicitud')->get();
        dd($consula);
        $user=auth()->user();

        $data = array('email'=> $user->email, 'name'=>$user->name, 'nombreProyecto'=>"Proyecto nombre", 'etapa'=>2);
        //Para enviar correo de confirmacion de nuevo
        Mail::send('Mail.evaluacionFase1', $data, function ($message) use ($data){
            $message->to($data['email'], $data['name']);
            $message->subject('Evaluación de solicitud Fase 1 completada');
            if($data['etapa']==1){
                $message->subject('Evaluación de solicitud Fase 1 completada');
            }
            elseif($data['etapa']==2){
                $message->subject('Evaluación de solicitud Fase 2 completada');
            }
        });
        return redirect('/email');
    });

        // [PROVISIONAL]
    //objetivos & alcances
    //Route::get('proyecto/detalles/{id}', 'RecursoProyectoController@crear_objetivo')->name('proyecto_detalle.create');
    // factibilidad
    Route::get('proyecto/factibilidad/{id}', 'SolicitudController@factibilidad')->name('factibilidad.create')
    ->middleware('has.permission:solicitudes.create');

    Route::post('proyecto/factibilidad', 'SolicitudController@factibilidad_store')->name('factibilidad.store')
    ->middleware('has.permission:solicitudes.create');

    Route::get('proyecto/factibilidad_edit/{id}', 'SolicitudController@factibilidad_edit')->name('factibilidad.edit')
    ->middleware('has.permission:solicitudes.create');

    Route::put('proyecto/factibilidad_update', 'SolicitudController@factibilidad_update')->name('factibilidad.update') 
    ->middleware('has.permission:solicitudes.create');

    //planificacion
    
    /**********************Indicador******************/
    //Solicitud
    Route::post('proyecto/indicadores', 'IndicadorController@store')->name('proyecto_indicadores.store')
    ->middleware('has.permission:solicitudes.index');

    Route::put('proyecto/indicadores_update', 'IndicadorController@update')->name('proyecto_indicadores.update')
    ->middleware('has.permission:solicitudes.index');

    Route::delete('proyecto/indicadores', 'IndicadorController@destroy')->name('proyecto_indicadores.destroy')
    ->middleware('has.permission:solicitudes.index');

    Route::post('indicadores/store', 'IndicadorController@store')->name('indicadores.store')
    ->middleware('has.permission:indicadores.create');

    Route::get('indicadores/{id}', 'IndicadorController@index')->name('indicadores.index')
    ->middleware('has.permission:indicadores.index');

    Route::get('indicadores/create', 'IndicadorController@create')->name('indicadores.create')
    ->middleware('has.permission:indicadores.create');

    Route::put('indicadores/{proyecto}', 'IndicadorController@update')->name('indicadores.update')
    ->middleware('has.permission:indicadores.edit');

    Route::get('indicadores/{proyecto}', 'IndicadorController@show')->name('indicadores.show')
    ->middleware('has.permission:indicadores.show');

    Route::delete('indicadores/{proyecto}', 'IndicadorController@destroy')->name('indicadores.destroy')
    ->middleware('has.permission:indicadores.destroy');

    //proyecto aprobado

    Route::get('proyecto/indicadores/{id}', 'IndicadorController@index')->name('indicadores.index');

    Route::get('indicador/tipo/{id}', 'IndicadorController@cambiar_tipo')->name('indicador.tipo');

    Route::get('indicador/tipo_grafico/{id}', 'IndicadorController@cambiar_tipo_grafico')->name('indicador.tipo_grafico');

    Route::post('indicador/variable', 'IndicadorController@variable')->name('indicador.variable');

    Route::delete('variable', 'IndicadorController@destroy_variable')->name('variable.destroy');

    Route::get('indicador/confirmar/{id}', 'IndicadorController@confirmar')->name('indicador.confirmar');

    Route::post('datos/barra', 'DatosController@barra')->name('datos.barra');

    Route::get('indicador/general/{id}', 'IndicadorController@general')->name('indicador.general');

    Route::get('indicador/estadistica/{id}', 'IndicadorController@estadistica')->name('indicador.estadistica');

    Route::get('indicador/task/{id}', 'IndicadorController@task')->name('indicador.task');

    Route::post('indicador/descripcion', 'IndicadorController@descripcion')->name('indicador.descripcion');

    
    Route::get('stats/index', 'SolicitudController@stats2')->name('stats.index');

    /***********************Equipo por Proyecto ***************************/

    Route::get('proyecto/miembros/{id}', 'UsuarioEquipoRolController@index')->name('miembros_proyecto.index')
    ->middleware('has.permission:solicitudes.create');

    /***********************planificacion de tareas gantt****************************/

    Route::get('proyecto/tareas/{id_proyecto}', 'TaskController@index')->name('proyecto_tareas.index');
    
    Route::get('proyecto/tareasAvance/{id_proyecto}', 'TaskController@index')->name('tareas_avance.index');

    Route::get('tareasAsignaciones/{id_tarea}','TaskController@tareaAsignacionesFetch')->name('proyecto_tareas.asignaciones');

    /***********************Evaluacion ****************************/
    Route::get('evaluacion/{id}', 'EvaluacionSolicitudController@index')->name('evaluacion.index')
    ->middleware('has.permission:evaluacion.index');

    Route::get('evaluacion2/{id}', 'EvaluacionSolicitudController@index2')->name('evaluacion2.index')
    ->middleware('has.permission:evaluacion.index');

    Route::post('evaluacion/store/{id}', 'EvaluacionSolicitudController@store')->name('evaluacion.store')
    ->middleware('has.permission:evaluacion.create');

    Route::post('evaluacion/store2/{id}', 'EvaluacionSolicitudController@store2')->name('evaluacion.store2')
    ->middleware('has.permission:evaluacion.create');

    
    Route::get('evaluacion/final/{id}', 'EvaluacionSolicitudController@evaluacion_final')->name('evaluacion.final')
    ->middleware('has.permission:evaluacion.final');
    Route::get('evaluacion/final2/{id}', 'EvaluacionSolicitudController@evaluacion_final2')->name('evaluacion.final2')
    ->middleware('has.permission:evaluacion.final');

    Route::post('evaluacion/responder/{id}', 'EvaluacionSolicitudController@respuesta_evaluacion')->name('solicitud.responder')
    ->middleware('has.permission:solicitudes.index');

    /*********************Documentos************************************** */
    Route::get('proyecto/archivos', 'DocumentoController@archivos')->name('archivos.index')
    ->middleware('has.permission:solicitudes.create');
    Route::post('proyecto/archivos/store', 'DocumentoController@archivos_store')->name('archivos.store')
    ->middleware('has.permission:solicitudes.create');
    Route::get('proyecto/archivos/download/{id}', 'DocumentoController@archivos_download')->name('archivos.download')
    ->middleware('has.permission:solicitudes.create');








    
});



