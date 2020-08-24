@extends('simpleViews.recursos.listar')  
@section('title')
	Nuevo recurso
@endsection
@section('opcion')
<div class="col-5">
    <div class="card">
        <div class="card-header ">
            <div class="row">
                <div class="col-md-6 text-left">
                    <h2 class="card-title"><b>Nuevo recurso</b></h2>
                </div> 
                <div class="col-md-6 text-right">
                    Datos requeridos: *
                </div> 
            </div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('recursos.store')}}">
            @csrf 
                    <div class="input-group {{ $errors->has('tipoRec') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-minimal-down"></i>
                            </div>
                        </div>
                        <select class="form-control selectorWapis" id="tipoRec" name="tipoRec">
                            <option value="" selected disabled hidden>Seleccione un tipo de recurso *</option>
                            @foreach ($tiposrec as $tipo)
                                @if (old('tipoRec')==$tipo->id)                                     
                                    <option style="color: black !important;" value="{{$tipo->id}}" selected>{{ $tipo->nombre }}</option>
                                @else
                                    <option style="color: black !important;" value="{{$tipo->id}}">{{ $tipo->nombre }}</option>
                                @endif
                            @endforeach
                        </select>                   
                    </div>

                    <div class="input-group {{ $errors->has('marca') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-minimal-down"></i>
                            </div>
                        </div>
                        <select class="form-control selectorWapis" id="marca" name="marca">
                            <option value="" selected disabled hidden>Seleccione una marca *</option>
                            @foreach ($marcas as $marca)
                                @if (old('marca')==$marca->id)                                     
                                    <option style="color: black !important;" value="{{$marca->id}}" selected>{{ $marca->nombre }}</option>
                                @else
                                    <option style="color: black !important;" value="{{$marca->id}}">{{ $marca->nombre }}</option>
                                @endif                                
                            @endforeach
                        </select>                             
                    </div>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-pencil"></i>
                            </div>
                        </div>
                    <input type="text" name="nombre" value="{{old('nombre')}}" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre del recurso *') }}">
                        @include('alerts.feedback', ['field' => 'nombre'])
                    </div>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-pencil"></i>
                            </div>
                        </div>
                        <input type="text" name="modelo" value="{{old('modelo')}}" class="form-control{{ $errors->has('modelo') ? ' is-invalid' : '' }}" placeholder="{{ __('Modelo *') }}">
                        @include('alerts.feedback', ['field' => 'modelo'])
                    </div>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-pencil"></i>
                            </div>
                        </div>
                        <input rows="3" type="text" rows="3" name="descripcion" value="{{old('descripcion')}}" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" placeholder="{{ __('Descripción *') }}">
                        @include('alerts.feedback', ['field' => 'descripcion'])
                    </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-round btn-lg">{{ __('Crear') }}</button>
                </div>
                <br>
            </form>
        </div>
    </div>
</div>
@endsection
	
