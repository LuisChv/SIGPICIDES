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
            <form class="form" method="POST" action="{{route('solicitud.update', $proyecto->id)}}">
                @csrf     
                @method('PUT')                               
                <div class="card-body">
                    <div class="row">                        
                        <div class="col-md-6 input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-atom"></i>
                                </div>
                            </div>
                        <input required type="text" name="nombre" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre de la investigación') }}" value="{{ $proyecto->nombre }}" >
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>
                        
                        <div class="col-md-6 input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-atom"></i>
                                </div>
                            </div>
                            <input value="{{ $proyecto->tema }}" required type="text" name="tema" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Tema de la investigación') }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>
                        
                        <div class="col-md-6 input-group{{ $errors->has('tipoRec') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-minimal-down"></i>
                                </div>
                            </div>
                            <select required class="form-control selectorWapis" id="selector1" name="tipoRec">
                                <option value="" selected disabled hidden>Tipo de investigación</option>
                                @foreach ($tiposinv as $tipo)
                                    @if ($t->id==$tipo->id)                                     
                                        <option style="color: black !important;" value="{{$tipo->id}}" selected>{{ $tipo->nombre }}</option>
                                    @else
                                        <option style="color: black !important;" value="{{$tipo->id}}">{{ $tipo->nombre }}</option>
                                    @endif   
                                @endforeach
                            </select>   
                            @include('alerts.feedback', ['field' => 'tipoRec'])                    
                        </div>
                        
                        <div class="col-md-6 input-group {{ $errors->has('subtipo') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend" id="prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-minimal-down"></i>
                                </div>
                            </div>
                            <select required class="form-control selectorWapis" id="selector2" name="subtipo">
                                <option value="">Subtipo de investigación</option>
                                @foreach($sub_tipos as $subtipo)
                                    @if ($t->id == $subtipo->id_tipo)
                                        @if ($proyecto->id_subtipo==$subtipo->id)
                                            <option selected style="color: black !important;" value="{{$subtipo->id}}" 
                                                class="{{$subtipo->id_tipo}}">{{$subtipo->nombre}}
                                            </option>
                                        @else
                                            <option style="color: black !important;" value="{{$subtipo->id}}" 
                                                class="{{$subtipo->id_tipo}}">{{$subtipo->nombre}}
                                            </option>
                                        @endif
                                    @else
                                        <option style="color: black !important; display:none;" value="{{$subtipo->id}}" 
                                            class="{{$subtipo->id_tipo}}">{{$subtipo->nombre}}
                                        </option>
                                    @endif
                                    
                                
                                @endforeach
                            </select>     
                            @include('alerts.feedback', ['field' => 'subtipo'])                       
                        </div>

                        <div class="col-md-6 input-group{{ $errors->has('descripcion') ? ' has-danger' : '' }}">
                            <textarea required class="form-control border border-light" rows="6" name="descripcion" placeholder="Describa su proyecto">{{ $proyecto->descripcion }}</textarea>
                            @include('alerts.feedback', ['field' => 'descripcion'])
                        </div>    

                        <div class="col-md-6 input-group{{ $errors->has('justificacion') ? ' has-danger' : '' }}">
                            <textarea required class="form-control border border-light" rows="6" name="justificacion" placeholder="Justificación del proyecto">{{ $proyecto->justificacion }}</textarea>
                            @include('alerts.feedback', ['field' => 'justificacion'])
                        </div> 

                        <div class="col-md-6 input-group{{ $errors->has('resultados') ? ' has-danger' : '' }}">
                            <textarea required class="form-control border border-light" name="resultados" placeholder="Resultados esperados del proyecto">{{ $proyecto->resultados }}</textarea>
                            @include('alerts.feedback', ['field' => 'resultados'])
                        </div> 

                        <div class="col-md-6 text-right">
                            <br>
                            <button class="btn btn-primary" type="submit">Siguiente</button>
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
           
            <a href="{{ route('solicitud.create')}}">Planificación</a>
            <!--a href="{{ route('cides') }}">Acerca de</a>
                <a href="#">Acciones largaaaaaaaaas</a-->
        </nav>
    </div>
</div>
@endsection
        