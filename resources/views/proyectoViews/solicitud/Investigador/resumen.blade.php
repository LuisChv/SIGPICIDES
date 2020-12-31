@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
Primera etapa
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            
            <div class="card-body">
                <h3>
                    Información general
                </h3>
                <div class="row">
                    <div class="col-md-8">
                        <table class="table">
                            <tr>
                                <th>
                                    Tipo:
                                </th>
                                <td colspan="5">
                                    {{$t->nombre}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Subtipo:
                                </th>
                                <td colspan="5">
                                    {{$st->nombre}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Tema:
                                </th>
                                <td colspan="5">
                                    {{$proyecto->tema}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Nombre:
                                </th>
                                <td colspan="5">
                                    {{$proyecto->nombre}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Descripción:
                                </th>
                                <td colspan="5">
                                    {{$proyecto->descripcion}}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Justificación:
                                </th>
                                <td colspan="5">
                                    {{$proyecto->justificacion}}
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <table class="table">
                            <tr>
                                <th>
                                    Cantidad de miembros:
                                </th>
                                <td class="text-right">
                                    {{$equipo->miembros}}
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>
                                    Duración:
                                </th>
                                <td class="text-right">
                                    {{$proyecto->duracion}}
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>
                                    Costo:
                                </th>
                                <td class="text-right">
                                    $ {{$proyecto->costo}}
                                </td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card" id="objetivosCard">
            <div class="card-header ">
                <h4>
                    Objetivos
                </h4>
            </div>
            <div class="card-body">
                <table class="table">
                    @foreach ($objetivos as $objetivo)
                    <tr>
                        <td>
                            <i class="tim-icons icon-compass-05"></i> {{$objetivo->descripcion}}
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card" id="alcancesCard">
            <div class="card-header ">
                <h4>
                    Alcances
                </h4>
            </div>
            <div class="card-body">
                <table class="table">
                    @foreach ($alcances as $alcance)
                    <tr>
                        <td>
                            <i class="tim-icons icon-compass-05"></i> {{$alcance->descripcion}}
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card" id="indicadoresCard">
            <div class="card-header ">
                <h4>
                    Indicadores
                </h4>
            </div>
            <div class="card-body">
                <table class="table">
                    @foreach ($indicadores as $indicador)
                    <tr>
                        <td>
                            <i class="tim-icons icon-sound-wave"></i> {{$indicador->detalle}}
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header ">
                Recursos
            </div>
            <div class="card-body">
                <div class="card-body">  
                    
                    <table width='100%' class="table">
                        <tr>
                            <th width='30%'>Recursos</th>
                            <th width='30%'>Cantidad</th>
                            <th width='40%'>Detalle</th>
                        </tr>
                        @foreach($recursosProy as $rec)
                        <tr>                     
                            <td>
                                <i class="tim-icons icon-planet"></i>
                                &nbsp;{{ $rec->nombre }}
                            </td> 
                            <td>
                                {{ $rec->cantidad }}
                            </td>  
                            <td>
                                {{ $rec->detalle }}
                            </td>                            
                        </tr>
                        @endforeach
                    </table>
                    
                    <br>
                </div>
            </div>
        </div> 
    </div>
    @if ($solicitud->etapa==2 && ($solicitud->id_estado==6 || $solicitud->id_estado==8 || $solicitud->id_estado==7))
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3>Factibilidad</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td><b>Factibilidad técnica</b></td>
                        
                        <td>{{$factibilidad->tecnica}}</td>
                    </tr>    
                    <tr>
                        <td><b>Factibilidad económica</b></td>

                        <td>{{$factibilidad->economia}}</td>
                    </tr> 
                    <tr>
                        <td><b>Factibilidad financiera</b></td>

                        <td>{{$factibilidad->financiera}}</td>
                    </tr> 
                    <tr>
                        <td><b>Factibilidad operativa</b></td>

                        <td>{{$factibilidad->operativa}}</td>
                    </tr> 
                    <tr>
                        <td><b>Factibilidad extra</b></td>

                        <td>{{$factibilidad->fac_extra}}</td>
                    </tr>                 
                </table>
            </div>
        </div>
    </div>
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
    @endif
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" align="center">
                <h1>EVALUACI&Oacute;N FINAL</h1>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" align="center">
                <h3>Comentarios de primer etapa</h3>
            </div>
        </div>
    </div>
    @foreach ($evaluaciones as $eva)        
        @if ($eva->etapa==1)
            @foreach ($miembros_comite as $miembro) 
                @if ( $eva->id_user == $miembro->id_usuario) 

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title text-center"><b>{{ $miembro->name }}</b></h3>           
                                <h4 class="text-center"><b>{{ $eva->estado }}</b></h4>
                            <p class="text-justify"><b>Comentario: </b> {{ $eva->comentario }} </p>
                            <br>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        @endif        
    @endforeach
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" align="center">
                <h3>Comentarios de segunda etapa</h3>
            </div>
        </div>
    </div>
    @foreach ($evaluaciones as $eva)        
        @if ($eva->etapa==2)
            @foreach ($miembros_comite as $miembro) 
                @if ( $eva->id_user == $miembro->id_usuario) 

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title text-center"><b>{{ $miembro->name }}</b></h3>           
                                <h4 class="text-center"><b>{{ $eva->estado }}</b></h4>
                            <p class="text-justify"><b>Comentario: </b> {{ $eva->comentario }} </p>
                            <br>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        @endif        
    @endforeach
</div>
<table class="col-md-12">
    <tr>
        @if ($solicitud->etapa==2)
            <td width="50%">
                <a class="btn btn-primary" target="_blank" href="{{ route('proyecto_tareas.index', $proyecto->id)  }}">
                    Ver planificacion
                </a>
            </td>    
        @endif
        
        <td width="50%" align="right">
        @if($solicitud->id_estado == 8)
            <a class="btn btn-primary" href="{{ route('solicitud.mis_solicitudes') }}">
                Regresar
            </a>
        @else
            @if ($solicitud->etapa == 1)
            <a class="btn btn-primary" href="{{ route('solicitud.edit', [$proyecto->id])}}">
                Siguiente
            </a>
            @else
            <a class="btn btn-primary" href="{{ route('factibilidad.create', [$proyecto->id]) }}">
                Siguiente
            </a>
            @endif
        @endif
        </td>
    </tr>
</table>
<div class="col-md-12 text-right">
    
</div>
<script src="{{ asset('black') }}/js/oai.js"></script>
@endsection
