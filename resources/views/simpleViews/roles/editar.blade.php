@extends('simpleViews.roles.index')  
@section('title')
	Nuevo Role
@endsection
@section('opcion')
<div class="col-5">
    <div class="card">
        <div class="card-header ">
            <div class="row">
                <div class="col-sm-8 text-left">
                    <h2 class="card-title"><b>Editar Role</b></h2>
                </div> 
            </div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('roles.update', $role->id)}}">
            @csrf 
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="tim-icons icon-pencil"></i>
                        </div>
                    </div>
                    <input type="text" name="name" value="{{$role->name}}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre del Role') }}">
                    @include('alerts.feedback', ['field' => 'name'])
                </div>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="tim-icons icon-pencil"></i>
                        </div>
                    </div>
                    <input type="text" name="slug" value="{{$role->slug}}" class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre de dominio slug') }}">
                    @include('alerts.feedback', ['field' => 'slug'])
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-round btn-lg">{{ __('Actualizar') }}</button>
                </div>
                <br>
            </form>
        </div>
    </div>
</div>
@endsection
	

