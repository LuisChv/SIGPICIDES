@extends('simpleViews.tipoInvestigacion.listar')
@section('title')
	Nuevo Tipo de investigación
@endsection
@section('opcion')
<div class="col-md-5">
    <div class="card">
        <div class="card-header ">
            <div class="row">
                <div class="col-sm-12 text-left">
                    <h2 class="card-title"><b>Nuevo Tipo de investigación</b></h2>
                </div> 
            </div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('tipo_investigacion.store')}}">
                @csrf
                <div class="input-group{{ $errors->has('descripcion') ? ' has-danger' : '' }}">
                    <div class="input-group{{ $errors->has('descripcion') ? ' has-danger' : '' }}">
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
@endsection
	
