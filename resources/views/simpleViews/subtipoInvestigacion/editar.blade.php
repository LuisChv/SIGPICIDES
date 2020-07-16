@extends('simpleViews.tipoInvestigacion.listar')
@section('title')
	Editar Subtipo de investigación
@endsection
@section('opcion')
<div class="col-5">
    <div class="card">
        <div class="card-header ">
            <h2 class="card-title"><b>Editar subtipo de investigación</b></h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('subtipo_investigacion.update', $subtipo->id)}}">
                    @csrf
                    @method('PUT')           
                    <div class="input-group{{ $errors->has('descripcion') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-minimal-down"></i>
                            </div>
                        </div>
                        <select class="form-control selectorWapis" id="tipoRec" name="tipoRec">
                            <option value="" selected disabled hidden>Seleccione un tipo de investigación</option>
                            @foreach ($tiposinv as $tipo)
                                @if ($subtipo->id_tipo==$tipo->id)
                                    <option value="{{$tipo->id}}" selected>{{ $tipo->nombre }}</option>
                                @else
                                    <option value="{{$tipo->id}}">{{ $tipo->nombre }}</option>
                                @endif
                            @endforeach
                        </select>
                        @include('alerts.feedback', ['field' => 'tipoRec'])                            
                    </div>
                    <div class="input-group{{ $errors->has('descripcion') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-pencil"></i>
                            </div>
                        </div>
                        <input type="text" value="{{$subtipo->nombre}}" name="nombre" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre del recurso') }}">
                        @include('alerts.feedback', ['field' => 'nombre'])
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-round btn-lg">{{ __('Editar') }}</button>
                    </div>
                <br>
            </form>
        </div>
    </div>
</div>
@endsection
	
