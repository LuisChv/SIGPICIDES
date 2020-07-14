@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile'])

@section('title')
    Editar perfil
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="title">{{ __('Editar perfil') }}</h2>
                </div>
                <form method="post" action="{{ route('profile.update') }}" autocomplete="off">
                    <div class="card-body">
                            @csrf
                            @method('put')

                            @include('alerts.success')

                            <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="tim-icons icon-single-02"></i>
                                    </div>
                                </div>
                                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre') }}" value="{{ old('name', auth()->user()->name) }}">
                            </div>

                            <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="tim-icons icon-email-85"></i>
                                    </div>
                                </div>
                                <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Correo electrónico') }}" value="{{ old('email', auth()->user()->email) }}">
                            </div>

                            <div class="input-group{{ $errors->has('institucion') ? ' has-danger' : '' }}" aria-required="true">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="tim-icons icon-bank"></i>
                                    </div>
                                </div>
                                <input type="text" name="institucion" class="form-control{{ $errors->has('institucion') ? ' is-invalid' : '' }}" placeholder="{{ __('Institución de procedencia') }}" value="{{ old('institucion', auth()->user()->institucion) }}">
                                @include('alerts.feedback', ['field' => 'institucion'])
                            </div>

                            <div class="input-group{{ $errors->has('descripcion') ? ' has-danger' : '' }}">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="tim-icons icon-align-left-2"></i>
                                    </div>
                                </div>
                                <input type="text" name="descripcion" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" placeholder="{{ __('Descripción personal') }}" value="{{ old('descripcion', auth()->user()->descripcion) }}">
                                @include('alerts.feedback', ['field' => 'descripcion'])
                            </div>

                            <div class="input-group{{ $errors->has('fecha_nac') ? ' has-danger' : '' }}">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-birthday-cake" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <input type="date" max="2002-01-01" name="fecha_nac" class="form-control {{ $errors->has('fecha_nac') ? ' is-invalid' : '' }}" placeholder="{{ __('Fecha de nacimiento') }}" value="{{ old('fecha_nac', auth()->user()->fecha_nac) }}">
                                @include('alerts.feedback', ['field' => 'fecha_nac'])
                            </div>

                            <div class="input-group {{ $errors->has('sexo') ? ' has-danger' : '' }}">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="tim-icons icon-minimal-down"></i>
                                    </div>
                                </div>
                                <select class="form-control selectorWapis" id="sexo" name="sexo">
                                    <option value="" selected disabled hidden>Sexo</option>
                                    @if(auth()->user()->sexo)
                                        <option selected>Masculino</option>
                                        <option>Femenino</option>
                                    @else
                                        <option>Masculino</option>
                                        <option selected>Femenino</option>
                                    @endif
                                    
                                </select>    
                                @include('alerts.feedback', ['field' => 'sexo'])                        
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ __('Save') }}</button>
                    </div>
                    <br>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="title">{{ __('Cambiar contraseña') }}</h2>
                </div>
                <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                    <div class="card-body">
                        @csrf
                        @method('put')

                        @include('alerts.success', ['key' => 'password_status'])

                        <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                            <input type="password" name="old_password" class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Contraseña actual') }}" value="" required>
                            @include('alerts.feedback', ['field' => 'old_password'])
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Contraseña nueva') }}" value="" required>
                            @include('alerts.feedback', ['field' => 'password'])
                        </div>
                        <div class="form-group">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('Confirmar contraseña') }}" value="" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">{{ __('Change password') }}</button>
                    </div>
                    <br>
                </form>
            </div>
        </div>
        <!--div class="col-md-4">
            <div class="card card-user">
                <div class="card-body">
                    <p class="card-text">
                        <div class="author">
                            <div class="block block-one"></div>
                            <div class="block block-two"></div>
                            <div class="block block-three"></div>
                            <div class="block block-four"></div>
                            <a href="#">
                                <img class="avatar" src="{{ asset('black') }}/img/emilyz.jpg" alt="">
                                <h5 class="title">{{ auth()->user()->name }}</h5>
                            </a>
                            <p class="description">
                                {{ __('Ceo/Co-Founder') }}
                            </p>
                        </div>
                    </p>
                    <div class="card-description">
                        {{ __('Do not be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...') }}
                    </div>
                </div>
                <div class="card-footer">
                    <div class="button-container">
                        <button class="btn btn-icon btn-round btn-facebook">
                            <i class="fab fa-facebook"></i>
                        </button>
                        <button class="btn btn-icon btn-round btn-twitter">
                            <i class="fab fa-twitter"></i>
                        </button>
                        <button class="btn btn-icon btn-round btn-google">
                            <i class="fab fa-google-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div!-->
    </div>
@endsection
