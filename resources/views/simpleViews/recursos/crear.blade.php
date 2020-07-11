@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
	Nuevo recurso
@endsection
@section('content')
<div class="row">
	<div class="col-12">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-8 text-left">
                        <h2 class="card-title"><b>Nuevo recurso</b></h2>
                    </div> 
                </div>
            </div>
            <div class="card-body">
                <form>
                    <div class="input-group{{ $errors->has('descripcion') ? ' has-danger' : '' }}">
                        <div class="input-group col-sm-5">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-minimal-down"></i>
                                </div>
                            </div>
                            <select class="form-control" id="sexo" name="sexo">
                                <option>--Seleccionar Tipo de recurso--</option>
                                <option>Tipo 1</option>
                                <option>Tipo 2</option>
                            </select>                            
                        </div>

                        <div class="input-group{{ $errors->has('descripcion') ? ' has-danger' : '' }} col-sm-6">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-pencil"></i>
                                </div>
                            </div>
                            <input type="text" name="nombre" class="form-control{{ $errors->has('institucion') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre del recurso') }}">
                            @include('alerts.feedback', ['field' => 'nombre'])
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection