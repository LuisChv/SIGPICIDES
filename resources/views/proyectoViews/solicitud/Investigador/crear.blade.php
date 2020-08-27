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
                <form class="form" method="POST" action="{{route('solicitud.store')}}">
                    @csrf                                    
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
                                <div class="input-group{{ $errors->has('tipoRec') ? ' has-danger' : '' }}">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="tim-icons icon-minimal-down"></i>
                                        </div>
                                    </div>
                                    <select class="form-control selectorWapis" id="selector1" name="tipoRec">
                                    <option value="-1" selected disabled hidden>Seleccione un tipo de investigación</option>
                                        @foreach ($tiposinv as $tipo)
                                            @if (old('tipoRec')==$tipo->id)                                     
                                                <option style="color: black !important;" value="{{$tipo->id}}" selected>{{ $tipo->nombre }}</option>
                                            @else
                                                <option style="color: black !important;" value="{{$tipo->id}}">{{ $tipo->nombre }}</option>
                                            @endif   
                                            
                                        @endforeach
                                    </select>                    
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="tim-icons icon-minimal-down"></i>
                                        </div>
                                    </div>
                                    <select class="form-control selectorWapis" id="selector2" name="subtipo">
                                        <option value=-1>Seleccionar Subtipo de investigación</option>
                                        @foreach($sub_tipos as $subtipo)
                                        <option style="color: black !important;" value="{{$subtipo->id}}" 
                                            class="{{$subtipo->id_tipo}}">{{$subtipo->nombre}}</option>
                                        @endforeach
                                    </select>                            
                                </div>
                                <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <textarea class="form-control border border-light" rows="6" name="descripcion"placeholder="Describa su proyecto"></textarea>
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
                            </div>
                        </div>                            
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit">Siguiente &nbsp;&nbsp;&nbsp;<i class="tim-icons icon-double-right font-weight-bold"></i></button>
                        <br><br>
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
                <a href="{{ route('miembros.index')}}">Miembros</a>
                <a href="{{ route('solicitud.create')}}">Planificación</a>
                <!--a href="{{ route('cides') }}">Acerca de</a>
                <a href="#">Acciones largaaaaaaaaas</a-->
            </nav>
        </div>
</div>

<script>
    $('#selector1').change(function(){
        //$('#selector2').show();
        $('#selector2').val(-1);
        var idFiltro = $(this).val();
        console.log(idFiltro);
        if(idFiltro!=-1){
        //$('.'+idFiltro).show();
            $("#selector2 > option").each(function(){
                if($(this).hasClass(idFiltro)){
                    $(this).show();
                    console.log(this);
                }else{
                    $(this).hide();
                }
            });
        }
    });
</script>
@endsection
