@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
    Miembros de equipo
@endsection
@section('content')
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-9 text-left">
                        <h2 class="card-title"><b>Investigadores del sistema</b></h2>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container list-group">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th class="text-center" colspan = "3">Agregar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $use) 
                                <tr>                     
                                    <td> {{ $use->name }} </td>

                                    <td width='5%'>
                                        <a role="button" id="usuario" class="btn btn-primary" href="{{ route('miembros.store', $use->id ) }}"><i class="tim-icons icon-simple-add"></i></a>
                                    </td>
                                   
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="col-6">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-8 text-left">
                        <h2 class="card-title"><b> Miembros de equipo </b></h2>
                    </div> 
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Rol de proyecto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($miembros as $miembro) 
                        <tr>                     
                            <td> {{ $miembro->name }} </td>
                            <td> 
                                <select class="form-control selectorWapis" value="" id="rol" name="rol" disabled>
                                    <option value="" selected disabled hidden >--Seleccionar Rol--</option>
                                    @foreach ($roles as $rol)
                                        @if($miembro->id_rol==$rol->id)
                                            <option style="color: black !important;" selected>{{ $rol->name }}</option>
                                        @endif
                                        <option style="color: black !important;">{{ $rol->name }}</option>
                                    @endforeach
                                </select> 
                            </td>
                            <td width='5%'>
                                <a type="button" href="#" class="btn btn-default btn-sm btn-icon btn-round"><i class="tim-icons icon-key-25"></i></a>
                                <a type="button" href="#" class="btn btn-warning btn-sm btn-icon btn-round confirmar"><i class="tim-icons icon-simple-remove"></i></a>
                            </td>
                            <td width='5%'>
                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container menuF-container">
                <input type="checkbox" id="toggleF">
                <label for="toggleF" class="buttonF"></label>
                <nav class="navF">
                    <a href="{{ route('solicitud.create')}}">Recursos</a>
                    <a href="{{ route('solicitud.create')}}">Factibilidad</a>
                    <a href="{{ route('miembros.ver')}}">Miembros</a>
                    <a href="{{ route('solicitud.create')}}">Planificación</a>
                    <!--a href="{{ route('cides') }}">Acerca de</a>
                    <a href="#">Acciones largaaaaaaaaas</a-->
                </nav>
    </div>
</div>
@endsection

