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
                        <div class="col-sm-12 text-left">
                            <h2 class="card-title"><b>Registrar solicitud de investigación</b></h2>
                        </div>
                    </div>
                </div>
                <form class="form" method="post" action="#">
                    <div class="card-body">
                        <div class="row">                        
                        	<div class="col-sm-12 col-md-8">
                                <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="tim-icons icon-atom"></i>
                                        </div>
                                    </div>
                                    <input type="text" name="nombre" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre de la investigación') }}">
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>

                        		<div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="tim-icons icon-minimal-down"></i>
                                        </div>
                                    </div>
                                    <select class="form-control selectorWapis" id="sexo" name="sexo">
                                        <option>--Seleccionar tipo de investigación--</option>
                                        <option>Tipo 1</option>
                                        <option>Tipo 2</option>
                                    </select>                            
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="tim-icons icon-minimal-down"></i>
                                        </div>
                                    </div>
                                    <select class="form-control selectorWapis" id="sexo" name="sexo">
                                        <option>--Seleccionar Subtipo de investigación--</option>
                                        <option>SubTipo 1</option>
                                        <option>SubTipo 2</option>
                                    </select>                            
                                </div>
                                <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <textarea class="form-control border border-light" rows="6" name="descripcion"placeholder="Describa su proyecto"></textarea>
                                    </textarea>
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>   
                                <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <textarea class="form-control border border-light" rows="4" name="objetivo"placeholder="Describa los objetivos del proyecto"></textarea>
                                    </textarea>
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                                <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <textarea class="form-control border border-light" rows="4" name="alcance"placeholder="Describa los alcances del proyecto"></textarea>
                                    </textarea>
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>                        
                        	</div>
                            <div class="col-sm-12 col-md-4">
                                <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="tim-icons icon-coins"></i>
                                        </div>
                                    </div>
                                    <input type="number" step="0.01" name="costo" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Costo (US$)') }}">
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                                <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="tim-icons icon-watch-time"></i>
                                        </div>
                                    </div>
                                    <input type="number"  name="duracion" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Duración (meses)') }}">
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                            </div>
                        </div>                            
                    </div>        	
                </form>
            </div>
        </div>
        <div class="container menuF-container">
            <input type="checkbox" id="toggleF">
            <label for="toggleF" class="buttonF"></label>
            <nav class="navF">
                <a href="{{ route('solicitud.create')}}">Recursos</a>
                <a href="{{ route('solicitud.create')}}">Factibilidad</a>
                <a href="{{ route('solicitud.create')}}">Miembros</a>
                <a href="{{ route('solicitud.create')}}">Planificación</a>
                <!--a href="{{ route('cides') }}">Acerca de</a>
                <a href="#">Acciones largaaaaaaaaas</a-->
            </nav>
        </div>
</div>
@endsection
