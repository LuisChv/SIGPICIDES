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
                    Perfil de la solicitud
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
</div>
<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header" align="center">
                <h1>EVALUACI&Oacute;N</h1>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header" align="center">
                <h3 style="margin-bottom: 0px;">Comentarios</h3>
            </div>
            <div class="card-body">
                <div class="col-12">
                    <div style="border-right: 20 px; text-align: right;">
                        <button id="" type="button" class="btn btn-primary btn-sm btn-round" data-toggle="modal" data-target="#modalAgregarComentario">
                            + Agregar Comentario 
                        </button>                                     
                    </div>
                </div>
                <br>
                <textarea maxlength="2048" disabled min-row="5"  id="comentario1" class="form-control"> </textarea>
                <br>
            </div>
            <div class="card-footer"><br></div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
        <form method="POST" action=" {{ route( 'evaluacion.store', $solicitud->id)}}">
            @csrf  
            <div class="card-header" align="center">
                <h3 style="margin-bottom: 0px;">Resultado de evaluación</h3>
            </div>
            <div class="card-body">
                <table class="table border-sm">
                    <tbody class="form-group">
                        @foreach ($estados as $estado) 
                        <tr>
                            <td>
                                <input type="radio" name="rad" id="{{ $estado->id }}" value = "{{ $estado->id }}" onClick = "displayRadioValue()">
                            </td>
                            <td>
                                <p for="#{{ $estado->id }}">{{ $estado->estado }}</p>
                            </td>
                        </tr> 
                        @endforeach          
                        <tr><input type="hidden" name="resultado" id="resultado" ></tr>
                        <tr><input type="hidden" name="comentario" id="comentario"></tr>
                    </tbody>
                </table>            
            </div>
            <div class="card-footer" align="center">
                <button type=submit class="btn btn-primary">Enviar evaluación</button>
                <br><br>
            </div>
        </form>  
        </div>
    </div>
</div>

    <div class="modal fade" id="modalAgregarComentario" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-lg">
                <div class="modal-header">
                    <h5 class="modal-title">Nuevo comentario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="false">&times;</span>
                        </button>
                </div>
                <div class="modal-body">                     
                    <table class="table" style="background-color: white !important;" >
                        <tr>
                            <td><textarea maxlength="1900" id= "coment" required rows="3" style="color: #222a42 !important;" class="inputArea" name="descripcion_objetivo"></textarea></td>
                        </tr>
                        <input hidden name="id_proy" value=""/>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onClick = "agregarComentario()" id = "agregar" data-dismiss="modal">Añadir</button>
                </div>
            </div>
        </div>
    </div>


@endsection



<script langiage="javascript" type="text/javascript">

    function agregarComentario(){
            $('#comentario').val($('#coment').val());
            $('#comentario1').val($('#coment').val());
        }

    function displayRadioValue() { 
            var ele = document.getElementsByName('rad'); 
              
            for(i = 0; i < ele.length; i++) { 
                if(ele[i].checked) 
                $('#resultado').val(ele[i].value);
            } 
        } 
</script>

<script src="{{ asset('black') }}/js/oai.js"></script>