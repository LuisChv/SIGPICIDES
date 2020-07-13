@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
    Crear Usuario
@endsection
@section('content')
<div class="row">
    <div class="col-7">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-9 text-left">
                        <h2 class="card-title"><b>Administración de Usuarios</b></h2>
                    </div>
                    <div class="col-sm-3 text-right">
                        <a role="button" class="btn btn-primary" href="{{ route('users.create')  }}">
                            <i class="tim-icons icon-simple-add"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container list-group">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th class="text-right">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $user)                          
                                        <tr>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td class="text-right">
                                                <button type="button" class="btn btn-success btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-pencil"></i></button>
                                                <button type="button" class="btn btn-warning btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-simple-remove"></i></button>
                                            </td>
                                        </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="col-5">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-8 text-left">
                        <h2 class="card-title"><b>Nuevo Usuario</b></h2>
                    </div> 
                </div>
            </div>
            <div class="card-body col-12">
                <form class="form" method="post" action="{{ route('register') }}">
                    @csrf
                    <div class="card-body">
                        <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-single-02"></i>
                                </div>
                            </div>
                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre completo') }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>
                        <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-email-85"></i>
                                </div>
                            </div>
                            <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Correo electrónico') }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="tim-icons icon-lock-circle"></i>
                                        </div>
                                    </div>
                                    <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Contraseña') }}">
                                    @include('alerts.feedback', ['field' => 'password'])
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="tim-icons icon-lock-circle"></i>
                                        </div>
                                    </div>
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('Confirmar contraseña') }}">
                                </div>
                            </div>
                        </div>
                        <div class="input-group{{ $errors->has('descripcion') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-bank"></i>
                                </div>
                            </div>
                            <input type="text" name="institucion" class="form-control{{ $errors->has('institucion') ? ' is-invalid' : '' }}" placeholder="{{ __('Institución de procedencia') }}">
                            @include('alerts.feedback', ['field' => 'institucion'])
                        </div>
                        <div class="input-group{{ $errors->has('descripcion') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-align-left-2"></i>
                                </div>
                            </div>
                            <input type="text" name="descripcion" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" placeholder="{{ __('Descripción personal') }}">
                            @include('alerts.feedback', ['field' => 'descripcion'])
                        </div>
                        <div class="input-group{{ $errors->has('fecha_nac') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fa fa-birthday-cake" aria-hidden="true"></i>
                                </div>
                            </div>
                            <input type="date" max="2002-01-01" name="fecha_nac" class="form-control {{ $errors->has('fecha_nac') ? ' is-invalid' : '' }}" placeholder="{{ __('Fecha de nacimiento') }}">
                            @include('alerts.feedback', ['field' => 'fecha_nac'])
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-minimal-down"></i>
                                </div>
                            </div>
                            <select class="form-control selectorWapis" id="tipoRec" name="tipoRec">
                                <option>--Seleccionar Rol--</option>
                                @foreach ($roles as $rol)
                                <option>{{ $rol->name }}</option>
                                @endforeach
                            </select>                            
                        </div>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-minimal-down"></i>
                                </div>
                            </div>
                            <select class="form-control selectorWapis" id="sexo" name="sexo">
                            	<option>--Seleccionar género--</option>
                                <option>Femenino</option>
                                <option>Masculino</option>
                            </select>                            
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-round btn-lg">{{ __('Crear') }}</button>
                    </div>
                    <br/>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection