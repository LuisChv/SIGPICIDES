@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
Evaluar Solicitud
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
                    
                    <table width='100%' class="table">
                        <tr>
                            <th width='30%'>Recursos</th>
                            <th width='30%'>Cantidad</th>
                            <th width='40%'>Detalle</th>
                        </tr>
                        @foreach($recursosProy as $rec)
                        <tr>                     
                            <td>
                                &nbsp;&nbsp;&nbsp;&nbsp;<i class="tim-icons icon-planet"></i>
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
                <h1>EVALUACION</h1>
            </div>
            <div align="right">
                <button id="comentario" type="button" class="btn btn-success btn-sm btn-icon btn-round" data-toggle="modal" data-target="#" onClick=""><i class="tim-icons icon-simple-add"></i></button>
                 <label for="#comentario"><h4>Agregar Comentario</h2></label>               
            </div>
            <div class="card-body">
                <table>
                    <tbody>
                        <tr>
                            <td width="10%">
                                Usuario
                            </td>
                            <td width="70%">
                                <textarea name="" id="" rows="3" cols="50%" disabled></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                <table>
                    <tbody>
                    <tr>
                        <input type="checkbox" id="aprobado">
                        <label for="#aprobado"><h3>Aprobado</h3></label>
                    </tr>
                    <tr>
                        <input type="checkbox" id="parcial">
                        <label for="#parcial"><h3>Aprobado con Observaciones</h3></label>
                    </tr>
                    <tr>
                        <input type="checkbox" id="rechazado">
                        <label for="#rechazado"><h3>Rechazado</h3></label>
                    </tr>
                    </tbody>
                </table>
               
            </div>

        </div>
    </div>
</div>


@endsection