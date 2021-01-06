@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
    Planificación
@endsection
@section('content')



<!DOCTYPE html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!--Explicacion de los componentes del gantt https://docs.dhtmlx.com/gantt/desktop__table_templates.html
        
        para convertir a pdf también tiene a png y demás https://docs.dhtmlx.com/gantt/api__gantt_exporttopdf.html
     <script src="http://export.dhtmlx.com/gantt/api.js"></script>
    
    Para solo leer https://docs.dhtmlx.com/gantt/desktop__readonly_mode.html


    para los estilos del gantt-->
    <!--<link rel="stylesheet" href="https://files.dhtmlx.com/30d/0801b74b161df383f7de350535901db6/dhtmlxgantt_contrast_black.css">-->
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
    
</head>
<body>
    <div id="gantt_here" style='width:100%; height:510px;'></div>
    <br>
        <table width="100%">
            <tr>
                <td width="50%">
                    <a class="btn btn-primary" href="{{ route('proyecto.resumen', [$idProyecto]) }}">
                        Resumen
                    </a>
                </td>
                <td width="50%" align="right">
                    <a class="btn btn-primary" href="{{ route('indicadores.index', [$idProyecto]) }}">
                        Indicadores
                    </a>
                </td>
            </tr>
        </table>

       
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
        {name: "buttons", label: "Avance", width: 50,
    template: function(task){
            var buttons =
            '<center><input onclick="avanceGantt(this)" type=button value="✔" class="btn btn-sm btn-primary btn-round btn-icon align-text-center"></center>';
            return buttons; 
            }
        },
    ];
    
    //Idioma
    gantt.i18n.setLocale("es");
    //Nombre de las secciones en lightbox
    //Tareas normales
    gantt.locale.labels.section_time = "Fecha de inicio y la duración";
    gantt.locale.labels.section_description = "Nombre descriptivo de la tarea";    
    gantt.locale.labels.section_equipo = "Asignación de miembros";
    gantt.locale.labels.section_indicador = "Indicador que requerirá esta tarea";
    gantt.locale.labels.section_tipo = "Tipo de tarea";
    //Hitos
    gantt.locale.labels.section_timeH = "Fecha";
    gantt.locale.labels.section_descriptionH = "Nombre descriptivo del hito";        
    
    //Evento lanzado al abrir una tarea
    gantt.attachEvent("onLightbox", function (task_id){
        //document.getElementsByName("indicador")[0].checked= true;
        console.log(task_id);
        /*
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            for (var checkbox of checkboxes) {
            checkbox.disabled=true;
        }*/        
        var textarea = document.querySelectorAll('textarea');
        textarea[0].disabled=true;
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
    //Evento lanzado cuando se apreta el boton de guardar
    gantt.attachEvent("onLightboxSave", function(id, task, is_new){    
        return false;
    })
    //Evento lanzado antes de que un usuario arrastre algo (tarea, progreso, link, etc)
    gantt.attachEvent("onBeforeTaskDrag", function(id, mode, e){
        if(mode=="progress"){
            //console.log(@json(auth()->user()->roles[0]->name));
            //Validacion de que si el usuario es del comite no permitirles modificar los avances
            let rol= @json(auth()->user()->roles[0]->name);            
            if(@json($rolProyecto)=="comite" || @json($proyecto->id_estado!=1)){
                return false;
                console.log('si entro');
            }            
            return true;
        }
        return false;
    });
    //Evento lanzado antes de actualizar una tarea
    gantt.attachEvent("onBeforeTaskUpdate", function(id,new_item){
        new_item.progreso=true;
    });
    gantt.attachEvent("onBeforeRowDragEnd", function(id, parent, tindex){    
        return false;
    });
    gantt.attachEvent("onBeforeLinkAdd", function(id,link){
    //any custom logic here
        return false;
    });
    gantt.attachEvent("onBeforeLinkDelete", function(id,item){
    //any custom logic here
        return false;
    });
    gantt.templates.rightside_text = function(start, end, task){
        if(task.type == gantt.config.types.milestone){
            return task.text;
        }
        return "";
    };    
    gantt.config.order_branch = true;
    
    gantt.config.lightbox.sections=[
        {name:"description", height:70, map_to:"text", type:"textarea", focus:true},
        {name: "tipo", type: "checkbox", map_to: "tipo",   options: [ 
            {key:"milestone", label: "Hito"},                                                                                                            
        ]},
        {name:"time", height:40, map_to:"auto", type:"duration"},        
        //Para mostrar el porcentaje de avance y a quienes se les asigno la tarea
        //{name:"template", height:16, type:"template", map_to:"my_template"}, 
        /*Para asignarle un color a la tarea
        {default_value:"#32CD32", name: "taskColor", height: 22, map_to: "color", type: "select", options:colors},  
        Para ingresar el avance textual de la tarea
        {name:"avance", height:70, map_to:"avance", type:"textarea"},*/
        //Para agrega a los miembros del equipo
        {name: "equipo", type:"checkbox", height:60, map_to: "miembros", options:[    
            @php
                for ($i = 0; $i < sizeof($miembrosEquipo); $i++)
                    echo '{key:'. $miembrosEquipo[$i]->id .', label:"' . $miembrosEquipo[$i]->name . '&nbsp;&nbsp; "},'                
            @endphp
        ]},
        {name: "indicador", type:"checkbox", height:150, map_to: "indicadores", options:[                
            @php
                    for ($i = 0; $i < sizeof($indicadores); $i++)
                    echo '{key:'. $indicadores[$i]->id .', label:"' . $indicadores[$i]->detalle . '&nbsp;&nbsp; "},'
            @endphp
        ]},
    ];
    //Configuracion lightbox para milestones
    gantt.config.lightbox.milestone_sections= [
        {name: "descriptionH", height: 70, map_to: "text", type: "textarea", focus: true},
        {name: "timeH", type: "duration", single_date: true, map_to: "auto"}
    ];
    //Deshabilitar boton de guardar y eliminar
    gantt.config.buttons_left = ["dhx_cancel_btn"];
    gantt.config.buttons_right = [];
    //Scroll
    gantt.config.autoscroll = true;
    gantt.config.autoscroll_speed = 50;
    //Inicializa el gant
    //Permitir o no mover la barra de progreso
    gantt.config.drag_progress = true;
    gantt.init("gantt_here");
    //Llamar al controlador para llenar los datos, aca paso por parametro el id del proyecto seleccionado
    gantt.load("/api/data/{{$idProyecto}}");
    // gantt.config.scale_unit = "week"; //display by year
    // gantt.config.step = 1; //Set the step size of the time scale (X axis)
    // gantt.config.date_scale = "%w"; //date scale by year */

    gantt.config.scales = [
        {unit: "month", step: 1, format: "%F, %Y"},
        {unit: "week", step: 1, format: function (date) {
            return "Semana #" + gantt.date.getWeek(date);
        }},
        {unit: "day", step: 1, format: "%j %D", css: function(date) {
            if(!gantt.isWorkTime({ date: date, unit: "day"})){
                return "weekend"
            }
        }}
    ];
    gantt.config.scale_height=54;
    //Sirve para habilitar guardar informacion en la base
    var dp = new gantt.dataProcessor("/api");
    dp.init(gantt);
    dp.setTransactionMode("REST");

  /* 
  funcion para q el boton haga las tareas
  function task_operations(task_id,action){
        var task = gantt.getTask(task_id)
        if (action == "avancePrincipal") {
            task.end_date = gantt.date.add(task.end_date, +1, 'day');
        }
        if (action == "avanceAsignado") {
            task.end_date = gantt.date.add(task.end_date, 1, 'day');
        }
        if (action == "avanceConsulta") {
            task.readonly = true
        }
        if (action == "avanceComite") {
            task.readonly = true
        }
        gantt.refreshData();
        }
    https://docs.dhtmlx.com/gantt/snippet/1c3e1c28
    Para que le asigne color a la tarea en específico
    gantt.locale.labels.section_taskColor = "Color";
    gantt.locale.labels.section_textColor = "Text Color";
    
    var colors = [
    {key:"", label:"Default"},
    {key:"#4B0082",label:"Indigo"},
    {key:"#FFFFF0",label:"Ivory"},
    {key:"#F0E68C",label:"Khaki"},
    {key:"#B0C4DE",label:"LightSteelBlue"},
    {key:"#32CD32",label:"LimeGreen"},
    {key:"#7B68EE",label:"MediumSlateBlue"},
    {key:"#FFA500",label:"Orange"},
    {key:"#FF4500",label:"OrangeRed"}
    ];
    */

    /*Para mostrar el porcentaje de avance y a quienes se les asigno la tarea https://docs.dhtmlx.com/gantt/desktop__template.html    
    gantt.locale.labels.section_avance = "Avance de la tarea detallado";
    gantt.locale.labels.section_template = "Detalles de la tarea";
    gantt.attachEvent("onBeforeLightbox", function(id) {
    var task = gantt.getTask(id);
    task.my_template = "<span id='title1'>Asignada: </span>"+ task.users
    +"<span id='title2'>Progreso: </span>"+ task.progress*100 +" %";
    return true;
});*/
//fUNCION PARA TRAER AL MODAL DEL AVANCE EL ID_TASK CORRESPONDIENTE PARA UTILIZARLO EN LOGICA
function avanceGantt(NODE) {
    let idTask= NODE.parentNode.parentNode.parentNode.parentNode.attributes.task_id.value;
    $('#archivosTarea').val(idTask);
    //console.log(idTask);
    //Si el usuario no es lider de proyecto o miembro del comite, no dejar insertar comentario    
    if((@json($rolProyecto)==6 || @json($rolProyecto)==7) || @json($proyecto->id_estado)!=1){
        $('#avanceComentarioEntrada').hide();
    }
    //Elemento donde se agregaran los comentarios
    let comentariosLista=document.getElementById('comentariosList');
    //Eliminar todos los comentarios para que solo se muestren los comentarios del avance abierto
    while (comentariosLista.firstChild){
        comentariosLista.removeChild(comentariosLista.firstChild);
    } 
    //Traer comentarios para mostrarlos en modal
    $.ajax({
        url: '/comentariosTarea/'+ idTask,        
        type: 'get',
        dataType: 'json',
        success: function(response){            
        let comentarios= response.comentarios;        
        
            for(let i=0; i<response.comentarios.length; i++){                
                var nodeDueño= document.createElement("p");
                nodeDueño.classList.add("font-weight-bold");
                var textNodeDueño= document.createTextNode(comentarios[i].name +':');
                nodeDueño.appendChild(textNodeDueño);
                var nodeComentario = document.createElement("p");
                var textNodeComentario= document.createTextNode(comentarios[i].comentario);
                nodeComentario.appendChild(textNodeComentario);
                nodeDueño.style.marginBottom=0;
                nodeComentario.style.marginBottom=0;                
                comentariosLista.appendChild(nodeDueño);
                comentariosLista.appendChild(nodeComentario);
            }            
        }
    });    

    let archivosLista=document.getElementById('archivosList');
    
    while (archivosLista.firstChild){
        archivosLista.removeChild(archivosLista.firstChild);
    } 
    //Traer archivos para mostrarlos en modal
    $.ajax({
        url: '/archivosTarea/'+ idTask,        
        type: 'get',
        dataType: 'json',
        success: function(response){            
        let documentos= response.documentos;        
        
            for(let i=0; i<response.documentos.length; i++){                
                var node= document.createElement("p");
                var textNode= document.createTextNode(documentos[i].nombre); 
                node.appendChild(textNode);                  
                let id_doc = documentos[i].id;
                
                var ref= document.createElement("a");
                var textRef= document.createTextNode("Descargar");
                //ref.href ="{{ route('archivos.download', [$indicador->id , $file->id] )}}"   
                
                ref.appendChild(textRef); 
                        
                archivosLista.appendChild(node);
                archivosLista.appendChild(ref);
            }            
        }
    }); 

    //let modalAvance= document.getElementById("modalAgregarComentario");
    $('#modalAgregarComentario').modal('show');
    //Agregar id_tarea como atributo del boton de guardar comentario, para que al guardar comentario lo haga a esa tarea    
    let botonGuardarC=document.getElementById('BotonGuardarComentarioGA');
    botonGuardarC.setAttribute("id_task", idTask);    
    
}

</script>

<!--//TODO MODAL en proceso-->
<div class="modal fade" width="110%"  id="modalAgregarComentario" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <ul class="nav nav-pills" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Archivos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Comentarios</a>
                    </li>
                </ul>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="false">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <!--Area de subida de archivos-->
                        <form class="form" method="POST" action="{{ route('archivos.tareas.store', $idProyecto )}}" enctype="multipart/form-data">
                            @csrf  
                            <input type="hidden" name="archivosTarea" id = "archivosTarea">
                            <p class ="title"> Subir Archivos </p>
                            <input type="file" name="files[]" class = "form-control" multiple>
                            <div class="normal-box">
                                <table class="col-md-12">
                                    <tr>
                                        <p>  <center> <b> Archivos disponibles </b> </center> </p>
                                    </tr>
                               
                                    <!--Listar los archivos que ya estan subidos-->                           
                                    <tr>
                                        <div id="archivosList" class="list"></div>
                                    </tr>                          
                                </table>
                                    
                            </div> 

                            <br><p class ="title">Descripcion de Avance </p>
                            <textarea required rows="3" style="color: #222a42 !important;" class="inputArea"  name="descripcionAvance" placeholder="Descripción del avance" maxlength="900">
                            </textarea>
                            <div class = "">
                                <button class="btn btn-primary" id = "agregarArchivo" value = "Guardar" ><i class="tim-icons icon-attach-87" title="Agregar archivos"></i></button>
                                <button class="btn btn-default" value = "Cancelar" data-dismiss="modal" title="Cancelar"><i class="tim-icons icon-simple-remove"></i></button>
                            </div>
                                                                                     
                        </form>
                        
                        <!--Fin Area de subida de archivos-->                    
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <!--Area de subida de comentarios-->                        
                        <p><b>Comentarios</b></p>
                            <!--lista de comentarios-->
                        <div id="comentariosList" class="comment-box cuadroComentario">
                                <p class="font-weight-bold">Nombre persona:</p>
                                <p>Comentario de persona</p>                                                           
                        </div>
                        <br>
                        <table id="avanceComentarioEntrada" class="col-md-12">
                            <tr>
                                <td width="110%" align="left">
                                    <textarea id="ComentarioAvance" class="inputArea" row="2" name="comentario" placeholder="Escribir un comentario..." maxlength="900"></textarea>
                                </td>
                                <td align="left">
                                <button onclick="agregarComentarioAvance(this, {{auth()->user()->id}})" id="BotonGuardarComentarioGA"  class="btn btn-sm btn-primary btn-round btn-icon" title="Añadir comentario"><i class="tim-icons icon-chat-33"></i></button>
                                </td>
                            </tr>
                        </table>                    
                        <!--Fin Area de subida de comentarios-->
                    </div>
                </div>
            </div>            
        </div>
    </div>
</div>
</body>

@endsection