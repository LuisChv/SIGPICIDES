@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
Vista previa
@endsection
@section('content')
    
<div class="row">
<div class="col-md-6">
        <div class="card">
            <div class="card">
                <div class="card-header">
                    <h3>Equipo de investigación</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Rol de proyecto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($miembros as $miembro) 
                            <tr>                     
                                <td> {{ $miembro->name }} </td>
                                <td> 
                                    <select required class="form-control selectorWapis" value="" id="rol" name="rol" disabled>
                                        <option value="" selected disabled hidden >Seleccionar rol</option>
                                        @foreach ($roles as $rol)
                                            @if($miembro->id_rol == $rol->id)
                                                <option style="color: black !important;" selected>{{ $rol->name }}</option>
                                            @else
                                                <option style="color: black !important;">{{ $rol->name }}</option>
                                            @endif
                                        @endforeach
                                    </select> 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3>Factibilidad</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td><b>Factibilidad técnica</b></td>
                        
                        <td class="text-justify">{{$factibilidad->tecnica}}</td>
                    </tr>    
                    <tr>
                        <td><b>Factibilidad económica</b></td>

                        <td class="text-justify">{{$factibilidad->economia}}</td>
                    </tr> 
                    <tr>
                        <td><b>Factibilidad financiera</b></td>

                        <td class="text-justify">{{$factibilidad->financiera}}</td>
                    </tr> 
                    <tr>
                        <td><b>Factibilidad operativa</b></td>

                        <td class="text-justify">{{$factibilidad->operativa}}</td>
                    </tr> 
                    <tr>
                        <td><b>Factibilidad extra</b></td>

                        <td class="text-justify">{{$factibilidad->fac_extra}}</td>
                    </tr>                 
                </table>
            </div>
        </div>
    </div>
    
</div>
<body>
    <input type="hidden" name="idProyecto" value="{{$idProyecto}}">
            <table width="100%">
                <tr>
                    <td width="50%">
                        @if($solicitud->id_estado != 7 && $solicitud->id_estado != 3)
                            <a class="btn btn-primary" href="{{ route('proyecto_tareas.index', [$idProyecto]) }}">
                                @if ($solicitud->id_estado != 3)    
                                    Anterior
                                @else
                                    Planificación
                                @endif
                            </a>
                        @else
                            <a class="btn btn-primary" href="{{ route('solicitud.mis_solicitudes') }}">
                               Regresar
                            </a>
                        @endif
                    </td>
                    <form method="POST" id="formulario{{$solicitud->id}}" action="{{route('solicitud.enviar2', [$solicitud->id])}}" >
                        @csrf
                        @if($solicitud->id_estado != 7)
                        <td width="50%" align="right">
                            @if ($solicitud->id_estado == 5 || $solicitud->id_estado == 6)
                            <button type="button" class="btn btn-primary" onClick="confirmarEnvio({{$solicitud->id}})">
                                Enviar
                            </button>
                            @else
                            <a class="btn btn-primary" href="{{ route('solicitud.mis_solicitudes') }}">
                                Mis solicitudes
                            </a>
                            @endif
                        </td>
                        @else

                        @endif
                    </form>
                </tr>
            </table>

            <script src="{{ asset('black') }}/js/oai.js"></script>
    
    
@endsection