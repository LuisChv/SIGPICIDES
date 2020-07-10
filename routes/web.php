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

<<<<<<< HEAD
Route::get('/', 'HomeController@index')->name('home');

=======
Route::get('home/', 'HomeController@index')->name('home');
Auth::routes();

Route::get('home/', 'HomeController@index')->name('home')->middleware('auth');
>>>>>>> e6adc5d12902e09607398056a6090f67cf848c13

Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'PageController@upgrade']);
});


Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
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

    //Solicitudes

});