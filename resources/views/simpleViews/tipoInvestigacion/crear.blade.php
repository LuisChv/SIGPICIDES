@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
	Nuevo Subtipo de investigación
@endsection
@section('content')
<div class="row">
	<div class="col-12">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-8 text-left">
                        <h2 class="card-title"><b>Nuevo Subtipo de investigación</b></h2>
                    </div> 
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('subtipo_investigacion.store')}}">
                    @csrf           
                    <div class="input-group{{ $errors->has('descripcion') ? ' has-danger' : '' }}">
                        <div class="input-group col-sm-5">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-minimal-down"></i>
                                </div>
                            </div>
                            <select class="form-control selectorWapis" id="tipoRec" name="tipoRec">
                                <option value="">--Seleccionar Tipo de investigación--</option>
                                @foreach ($tiposinv as $tipo)
                            <option value="{{$tipo->id}}">{{ $tipo->nombre }}</option>
                                @endforeach
                            </select>                            
                        </div>

                        <div class="input-group{{ $errors->has('descripcion') ? ' has-danger' : '' }} col-sm-6">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-pencil"></i>
                                </div>
                            </div>
                            <input type="text" name="nombre" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre del recurso') }}">
                            @include('alerts.feedback', ['field' => 'nombre'])
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-round btn-lg">{{ __('Crear') }}</button>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection