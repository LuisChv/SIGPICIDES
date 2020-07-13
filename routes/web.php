<?php

use Illuminate\Support\Facades\Route;

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

Route::get('home/', 'HomeController@index')->name('home')->middleware('auth');
//<a href="{{route('routename', párametros)}}"

//Routes de Icons, Maps, notificaciones ........
Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'PageController@upgrade']);
        Route::get('registro', ['as' => 'solicitud.registro', 'uses' => 'PageController@registro']);
        Route::get('consultarSolicitudes', ['as' => 'solicitud.consultar', 'uses' => 'PageController@consultarSolicitudes']);
});
//Routes de Perfil de usuario
Route::group(['middleware' => 'auth'], function () {
	//Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

//Routes 
Route::middleware(['auth'])->group(function(){

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

    Route::put('users/{user}', 'UserController@update')->name('users.update')
    ->middleware('has.permission:users.edit');

    Route::get('users/{user}', 'UserController@show')->name('users.show')
    ->middleware('has.permission:users.show');

    Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')
    ->middleware('has.permission:users.destroy');

    Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
    ->middleware('has.permission:users.edit');

    //Proyectos
    Route::post('proyectos/store', 'ProyectoController@store')->name('proyectos.store')
    ->middleware('has.permission:proyectos.create');

    Route::get('proyectos', 'ProyectoController@index')->name('proyectos.index')
    ->middleware('has.permission:proyectos.index');

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
    Route::post('recursos', 'RecursoController@store')->name('recursos.store')
    ->middleware('has.permission:recursos.create');

    Route::get('recursos', 'RecursoController@index')->name('recursos.index')
    ->middleware('has.permission:recursos.index');

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

    //Solicitudes
    Route::post('solicitudes/store', 'SolicitudController@store')->name('solicitudes.store')
    ->middleware('has.permission:solicitudes.create');

    Route::get('solicitudes', 'SolicitudController@index')->name('solicitudes.index')
    ->middleware('has.permission:solicitudes.index');

    Route::get('solicitudes/create', 'SolicitudController@create')->name('solicitudes.create')
    ->middleware('has.permission:solicitudes.create');

    Route::put('solicitudes/{proyecto}', 'SolicitudController@update')->name('solicitudes.update')
    ->middleware('has.permission:solicitudes.edit');

    Route::get('solicitudes/{proyecto}', 'SolicitudController@show')->name('solicitudes.show')
    ->middleware('has.permission:solicitudes.show');

    Route::delete('solicitudes/{proyecto}', 'SolicitudController@destroy')->name('solicitudes.destroy')
    ->middleware('has.permission:solicitudes.destroy');

    Route::get('solicitudes/{proyecto}/edit', 'SolicitudController@edit')->name('solicitudes.edit')
    ->middleware('has.permission:solicitudes.edit');

    //Indicadores
    Route::post('indicadores/store', 'IndicadorController@store')->name('indicadores.store')
    ->middleware('has.permission:indicadores.create');

    Route::get('indicadores', 'IndicadorController@index')->name('indicadores.index')
    ->middleware('has.permission:indicadores.index');

    Route::get('indicadores/create', 'IndicadorController@create')->name('indicadores.create')
    ->middleware('has.permission:indicadores.create');

    Route::put('indicadores/{proyecto}', 'IndicadorController@update')->name('indicadores.update')
    ->middleware('has.permission:indicadores.edit');

    Route::get('indicadores/{proyecto}', 'IndicadorController@show')->name('indicadores.show')
    ->middleware('has.permission:indicadores.show');

    Route::delete('indicadores/{proyecto}', 'IndicadorController@destroy')->name('indicadores.destroy')
    ->middleware('has.permission:indicadores.destroy');

    Route::get('indicadores/{proyecto}/edit', 'IndicadorController@edit')->name('indicadores.edit')
    ->middleware('has.permission:indicadores.edit');

    //Tipo de investigacion
    Route::post('tipo_investigacion/store', 'TipoInvestigacionController@store')->name('tipo_investigacion.store')
    ->middleware('has.permission:tipo_de_investigacion.create');

    Route::get('tipo_investigacion', 'TipoInvestigacionController@index')->name('tipo_investigacion.index')
    ->middleware('has.permission:tipo_de_investigacion.index');

    Route::get('tipo_investigacion/create', 'TipoInvestigacionController@create')->name('tipo_investigacion.create')
    ->middleware('has.permission:tipo_de_investigacion.create');

    Route::put('tipo_investigacion/{proyecto}', 'TipoInvestigacionController@update')->name('tipo_investigacion.update')
    ->middleware('has.permission:tipo_de_investigacion.edit');

    Route::get('tipo_investigacion/{proyecto}', 'TipoInvestigacionController@show')->name('tipo_investigacion.show')
    ->middleware('has.permission:tipo_de_investigacion.show');

    Route::delete('tipo_investigacion/{proyecto}', 'TipoInvestigacionController@destroy')->name('tipo_investigacion.destroy')
    ->middleware('has.permission:tipo_de_investigacion.destroy');

    Route::get('tipo_investigacion/{proyecto}/edit', 'TipoInvestigacionController@edit')->name('tipo_investigacion.edit')
    ->middleware('has.permission:tipo_de_investigacion.edit');

    Route::get('tipo_investigacion/createTipo', 'TipoInvestigacionController@createTipo')->name('tipo_investigacion.createTipo')->middleware('has.permission:tipo_de_investigacion.create');

});