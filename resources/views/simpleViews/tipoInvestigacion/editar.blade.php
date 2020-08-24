@extends('simpleViews.tipoInvestigacion.listar')
@section('title')
	Editar tipo de investigación
@endsection
@section('opcion')
<div class="col-md-5">
    <div class="card">
        <div class="card-header ">
            <div class="row">
                <div class="col-sm-12 text-left">
                    <h2 class="card-title"><b>Editar tipo de investigación</b></h2>
                    Datos requeridos: *
                </div> 
            </div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('tipo_investigacion.update', $tipoInv->id)}}">
                @csrf
                @method('PUT')
                <div class="input-group{{ $errors->has('descripcion') ? ' has-danger' : '' }}">
                    <div class="input-group{{ $errors->has('descripcị̣on') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-pencil"></i>
                            </div>
                        </div>
                    <input type="text" name="nombre" value="{{$tipoInv->nombre}}" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre del recurso *') }}">
                        @include('alerts.feedback', ['field' => 'nombre'])
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
@endsection

