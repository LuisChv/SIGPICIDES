@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
	Asignar recursos
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
                
            <div class="card-body">
                <h3>
                    Información general
                </h3>
                <table class="table">
                    <tr>
                        <th>
                            Tipo:
                        </th>
                        <td>
                            {{$t->nombre}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Subtipo:
                        </th>
                        <td>
                            {{$st->nombre}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tema:
                        </th>
                        <td>
                            {{$proyecto->tema}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nombre:
                        </th>
                        <td>
                            {{$proyecto->nombre}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Descripción:
                        </th>
                        <td>
                            {{$proyecto->descripcion}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Justificación:
                        </th>
                        <td>
                            {{$proyecto->justificacion}}
                        </td>
                    </tr>
                </table>
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
                            <td class="align-text-top"><i class="tim-icons icon-compass-05"></i></td>
                            <td>
                                {{$objetivo->descripcion}}
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
                    <div id="accordion" role="tablist" aria-multiselectable="true" class="card-collapse">
                        <div class="list-group">
                            @foreach ($tiposrec as $tipo)
                                <div>
                                    <table width='100%'>
                                        <tr class="list-group-item list-group-flush" data-toggle="collapse" data-toggle="collapse" data-target="#lista{{ $tipo->id }}" aria-expanded="false" aria-controls="lista{{ $tipo->id }}">
                                            <td>
                                                {{ $tipo->nombre }}&nbsp;&nbsp;
                                                <i class="tim-icons icon-minimal-down"></i>
                                            </td>
                                        </tr>
                                    </table>
                                    <div id="lista{{ $tipo->id }}" class="collapse" aria-labelledby="rec{{ $tipo->id }}" data-parent="#accordion">
                                        <table width='100%' class="table">
                                            <tr>
                                                <th>Recursos</th>
                                                <th>Detalle</th>
                                                <th class="text-center">Cantidad</th>
                                            </tr>
                                            @foreach($recursosProy as $rec)
                                                @if($rec->id_tipo==$tipo->id)  
                                                    <tr>                     
                                                        <td>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;<i class="tim-icons icon-planet"></i>
                                                            &nbsp;{{ $rec->nombre }}
                                                        </td> 
                                                        <td>
                                                            {{ $rec->detalle }}
                                                        </td>    
                                                        <td class="text-center">
                                                            {{ $rec->cantidad }}
                                                        </td>                            
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </table>
                                    </div>                      
                                </div>
                            @endforeach
                            <!--fin de dropdown-->
                            </br>
                        </div>                   
                    </div>
                </div>
            </div>
        </div> 
    </div>
</div>
<table class="col-md-12">
    <tr>
        <td width="50%">
            <a class="btn btn-primary" href="{{ route('proyecto_recursos.create', [$proyecto->id])}}">
                Recursos
            </a>
        </td>

        <td width="50%" align="right">
            @if ($solicitud->id_estado == 2)
                <a class="btn btn-primary" href="{{ route('solicitud.enviar', [$proyecto->id]) }}">
                    Enviar
                </a>
            @else
                <a disabled class="btn btn-primary" href="{{ route('solicitud.enviar', [$proyecto->id]) }}">
                    Enviar
                </a>
            @endif
        </td>
    </tr>
</table>
@endsection