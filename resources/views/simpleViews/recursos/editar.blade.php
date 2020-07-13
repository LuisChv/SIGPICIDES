@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
	Editar recurso
@endsection
@section('content')
<div class="row">
	<div class="col-12">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-8 text-left">
                        <h2 class="card-title"><b>Editar recurso</b></h2>
                    </div> 
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="/recursos/{{$recurso->id}}">
                @csrf
                @method('PUT') 
                    <div class="input-group{{ $errors->has('descripcion') ? ' has-danger' : '' }}">
                        <div class="input-group col-sm-5">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-minimal-down"></i>
                                </div>
                            </div>
                            <select class="form-control selectorWapis" id="tipoRec" name="tipoRec">
                                <option>--Seleccionar Tipo de recurso--</option>
                                @foreach ($tiporec as $tipo)
                                @if($recurso->id_tipo== $tipo->id)
                                    <option selected>{{ $tipo->nombre }}</option>
                                @else
                                    <option>{{ $tipo->nombre }}</option>
                                @endif
                                
                                @endforeach
                            </select>                            
                        </div>

                        <div class="input-group{{ $errors->has('descripcion') ? ' has-danger' : '' }} col-sm-6">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-pencil"></i>
                                </div>
                            </div>
                            <input type="text" name="nombre" value="{{$recurso->nombre}}" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre del recurso') }}">
                            @include('alerts.feedback', ['field' => 'nombre'])
                        </div>

                        <div class="input-group col-sm-5">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-minimal-down"></i>
                                </div>
                            </div>
                            <select class="form-control selectorWapis" id="marca" name="marca">
                                <option>--Seleccionar marca--</option>
                                @foreach ($marcas as $marca)
                                @if($recurso->id_marca== $marca->id)
                                    <option selected>{{ $marca->nombre }}</option>
                                @else
                                    <option>{{ $marca->nombre }}</option>
                                @endif
                                @endforeach
                            </select>                            
                        </div>

                        <div class="input-group{{ $errors->has('modelo') ? ' has-danger' : '' }} col-sm-6">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-pencil"></i>
                                </div>
                            </div>
                            <input type="text" name="modelo" value="{{$detalle->modelo}}" class="form-control{{ $errors->has('modelo') ? ' is-invalid' : '' }}" placeholder="{{ __('Modelo') }}">
                            @include('alerts.feedback', ['field' => 'modelo'])
                        </div>

                        <div class="input-group{{ $errors->has('descripcion') ? ' has-danger' : '' }} col-sm-11">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-pencil"></i>
                                </div>
                            </div>
                            <input rows="3" type="text" rows="3" name="descripcion" value="{{$detalle->descripcion}}" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" placeholder="{{ __('Descripción') }}">
                            @include('alerts.feedback', ['field' => 'descripcion'])
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-round btn-lg">{{ __('Editar') }}</button>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection