@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
Vista previa
@endsection
@section('content')

<div class="row">
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
                <textarea disabled min-row="5"  id="comentario1" class="form-control"> </textarea>
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
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nuevo comentario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="false">&times;</span>
                        </button>
                </div>
                <div class="modal-body">                     
                    <table class="table" style="background-color: white !important;" >
                        <tr>
                            <td><textarea id= "coment" required rows="3" style="color: #222a42 !important;" class="inputArea" maxlength="200" name="descripcion_objetivo"></textarea></td>
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

    
    <script src="{{ asset('black') }}/js/oai.js"></script>
    
   
@endsection

<script src="{{ asset('black') }}/js/sigpi.js"></script>

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