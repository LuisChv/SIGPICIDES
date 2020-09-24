@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
Vista previa
@endsection
@section('content')

<link rel="stylesheet" href="https://files.dhtmlx.com/30d/0801b74b161df383f7de350535901db6/dhtmlxgantt_contrast_black.css">
    <link href="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.css" rel="stylesheet">
    <!--Agregando libreria de ajax-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>    
    <script src="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.js"></script>
    <style type="text/css">
    html, body{
            height:100%;
            padding:0px;
            margin:0px;
            overflow: hidden;            
        }
            .gantt_cal_ltext{
            overflow: auto;
        }
    </style>
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
                            <td><textarea id= "coment" required rows="3" style="color: #222a42 !important;" class="inputArea" name="descripcion_objetivo"></textarea></td>
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
    
    <script type="text/javascript">
        //Formato de fecha para el gantt
        gantt.config.date_format = "%Y/%m/%d %H:%i:%s";
        
        //Permitir reordenar las tareas con interfaz grafica
        gantt.config.order_branch = true;
        gantt.config.order_branch_free = true;
        
        gantt.config.columns = [
            { name:"text", label: "Nombre de la tarea", tree:true, width:"*",map_to:"text",  resize:true },
            { name:"start_date", label: "Inicio", align:"center"},
            { name:"duration", label: "Duración", align:"center", width:50 },
            { name:"add", width:25 },
        ];
    
        //
        gantt.locale.labels.section_time = "Fecha de inicio y la duración";
        gantt.locale.labels.section_description = "Nombre descriptivo de la tarea";
        gantt.locale.labels.section_indicador = "Indicador que requerirá esta tarea";
        gantt.locale.labels.section_equipo = "Asignación de miembros";
        
        //Forma de acceder a la tarea que este abierte o esta sienda creada
        gantt.attachEvent("onBeforeLightbox", function(id) {
            var task = gantt.getTask(id);        
            task.idProyecto ="{{$idProyecto}}";
            task.idUser="{{auth()->user()->id}}";
            
            return true;
        });
        //Evento lanzado al abrir una tarea
        gantt.attachEvent("onLightbox", function (task_id){
            //document.getElementsByName("indicador")[0].checked= true;
            console.log(task_id);
            $.ajax({
                url: '/tareasAsignaciones/'+ task_id,
                type: 'get',
                dataType: 'json',
                success: function(response){
                    let miembros= @json($miembrosEquipo);
                    let indicadoresT=@json($indicadores);
                    for(let i=0; i<response.encargados.length; i++){
                        var indice=miembros.findIndex(x => x.id === response.encargados[i].id_usuario);
                        if(indice>=0){
                            document.getElementsByName("equipo")[indice].checked= true;
                        }
                    }
                    for(let i=0; i<response.indicadores.length; i++){
                        var indice=indicadoresT.findIndex(x => x.id === response.indicadores[i].id_indicador);
                        if(indice>=0){
                            document.getElementsByName("indicador")[indice].checked= true;
                        }
                    }
                }
            });
        });
        
        
        gantt.config.lightbox.sections=[
            {name:"description", height:70, map_to:"text", type:"textarea", focus:true},
            {name:"time", height:40, map_to:"auto", type:"duration"},
            
            //Para mostrar el porcentaje de avance y a quienes se les asigno la tarea
            //{name:"template", height:16, type:"template", map_to:"my_template"}, 
        
            /*Para asignarle un color a la tarea
            {default_value:"#32CD32", name: "taskColor", height: 22, map_to: "color", type: "select", options:colors},  
            Para ingresar el avance textual de la tarea
            {name:"avance", height:70, map_to:"avance", type:"textarea"},*/
    
            //Para usar checkbox https://docs.dhtmlx.com/gantt/desktop__checkbox.html
            {name: "indicador", type:"checkbox", height:150, map_to: "indicadores", options:[                
                @php
                        for ($i = 0; $i < sizeof($indicadores); $i++)
                        echo '{key:'. $indicadores[$i]->id .', label:"' . $indicadores[$i]->detalle . '&nbsp;&nbsp; "},'
                @endphp
            ]},
            //Para agrega a los miembros del equipo
            {name: "equipo", type:"checkbox", height:60, map_to: "miembros", options:[    
                @php
                    for ($i = 0; $i < sizeof($miembrosEquipo); $i++)
                        echo '{key:'. $miembrosEquipo[$i]->id .', label:"' . $miembrosEquipo[$i]->name . '&nbsp;&nbsp; "},'                
                @endphp
            ]},
        ];
         //Inicializa el gant
        gantt.init("gantt_here");
        //Llamar al controlador para llenar los datos, aca paso por parametro el id del proyecto seleccionado
        gantt.load("/api/data/{{$idProyecto}}");
        //Sirve para habilitar guardar informacion en la base
        var dp = new gantt.dataProcessor("/api");
        dp.init(gantt);
        dp.setTransactionMode("REST");
        
       
    </script>
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