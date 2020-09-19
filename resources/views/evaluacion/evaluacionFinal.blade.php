@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
Evaluar Solicitud
@endsection
@section('content')
<div class="row">

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
                        <h2 class="card-title text-center"><b>{{ $miembro->name }}</b></h2>
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

   

    

    <br>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header" align="center">
                <h3 style="margin-bottom: 0px;">Comentario Final</h3>
            </div>
            <div class="card-body">
                <div class="col-12">
                    <div style="border-right: 20 px; text-align: right;">
                        <button id="" type="button" class="btn btn-primary btn-sm btn-round" data-toggle="modal" data-target="#modalAgregarComentario">
                            + Comentario
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
        <form method="POST" action=" {{ route( 'solicitud.responder', $solicitud->id)}}">
            @csrf  
            <div class="card-header" align="center">
                <h3 style="margin-bottom: 0px;">Resultado Final de evaluación</h3>
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
                <button type=submit class="btn btn-primary">Finalizar evaluación</button>
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
                            <td><textarea id= "coment" required rows="3" style="color: #222a42 !important;" class="form-control border border-light rounded" name="descripcion_objetivo"></textarea></td>
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