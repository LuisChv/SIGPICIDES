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
        <div class="card">
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
        <div class="card">
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
        <div class="card">
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
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" align="center">
                <h1>EVALUACI&Oacute;N FINAL</h1>
            </div>
        </div>
    </div>

    @foreach ($evaluaciones as $eva)
        @foreach ($miembros_comite as $miembro) 
            @if ( $eva->id_user == $miembro->id_usuario) 

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center"><b>{{ $miembro->name }}</b></h3>
                        @foreach ($estados as $estado) 
                            @if ( $eva->respuesta == $estado->id )              
                                <h4 class="text-center"><b>{{ $estado->estado }}</b></h4>
                            @endif
                        @endforeach
                        <p class="text-justify"><b>Comentario: </b> {{ $eva->comentario }} </p>
                        <br>
                    </div>
                </div>
            </div>

            @endif
        @endforeach
    @endforeach
</div>
<div class="col-md-12 text-right">
    <a class="btn btn-primary" href="{{ route('factibilidad.create', [$proyecto->id]) }}">
        Siguiente
    </a>
</div>
@endsection