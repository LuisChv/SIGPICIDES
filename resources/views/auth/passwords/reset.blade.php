@extends('layouts.app', ['class' => 'login-page', 'page' => __('Reset password'), 'contentClass' => 'login-page'])

@section('content')
    <div class="col-lg-5 col-md-7 ml-auto mr-auto">
        <form class="form" method="POST" action="{{route('password_reset.update', $token)}}">
            @csrf
            @method('PUT')
            <div class="card card-login card-white">
                <div class="card-body">
                    @include('alerts.success')

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-email-85"></i>
                            </div>
                        </div>
                    <input type="email"  value="{{$email}}" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}">
                        @include('alerts.feedback', ['field' => 'email'])
                    </div>
                    <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-lock-circle"></i>
                                </div>
                            </div>
                            <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}">
                            @include('alerts.feedback', ['field' => 'password'])
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-lock-circle"></i>
                                </div>
                            </div>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('Confirm Password') }}">
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-lg btn-block mb-3">{{ __('Restablecer la contraseña') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
