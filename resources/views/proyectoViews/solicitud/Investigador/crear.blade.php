@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
	Nueva investigación
@endsection
@section('content')
<div class="row">
	<div class="col-12">
            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h2 class="card-title"><b>Registrar solicitud de investigación</b></h2>
                        </div>
                    </div>
                </div>
                <form class="form" method="post" action="#">
                	<div class="card-body">
                		<div class="input-group col-sm-7">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-minimal-down"></i>
                                </div>
                            </div>
                            <select class="form-control" id="sexo" name="sexo">
                                <option>--Seleccionar tipo de investigación--</option>
                                <option>Tipo 1</option>
                                <option>Tipo 2</option>
                            </select>                            
                        </div>
                        <div class="input-group col-sm-7">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-minimal-down"></i>
                                </div>
                            </div>
                            <select class="form-control" id="sexo" name="sexo">
                                <option>--Seleccionar Subtipo de investigación--</option>
                                <option>SubTipo 1</option>
                                <option>SubTipo 2</option>
                            </select>                            
                        </div>
                        <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }} col-sm-7">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-atom"></i>
                                </div>
                            </div>
                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre de la investigación') }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>
                	</div>        	
                </form>
                <div class="card-footer"></div>
            </div>
        </div>
</div>
@endsection
