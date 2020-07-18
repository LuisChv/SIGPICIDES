@extends('layouts.app', ['class' => 'login-page', 'page' => __('Reset password')])

@section('content')
    <div class="col-lg-5 col-md-7 ml-auto mr-auto">
        <form class="form" method="post" action="/password/restablecer">
            @csrf

            <div class="card card-login card-white">
                <div class="card-header">
                    <img src="{{ asset('black') }}/img/card-email.png" alt="">
                    <h1 class="card-title" align=center>{{ __('') }}</h1>
                </div><hr><hr><br><br>
                <div class="card-body">
                <p color="blue" align=justify>Si el correo electrónico ingresado se encuentra en la base de datos, en un momento recibirá un enlace para restablecer su contraseña.</p>
                <br>
                    @include('alerts.success')
                    
                    <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-email-85"></i>
                            </div>
                        </div>
                        <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}">
                        @include('alerts.feedback', ['field' => 'email'])
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-lg btn-block mb-3">{{ __('Enviar correo') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
