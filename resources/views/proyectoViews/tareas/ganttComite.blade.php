@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
    Nueva investigación
@endsection
@section('content')



<!DOCTYPE html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">

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
                    <a class="btn btn-primary" href="{{ route('evaluacion2.index', [$idProyecto]) }}">
                        Regresar 
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
        { name:"add", width:25 },
    ];

    //Nombre de las secciones en lightbox
    gantt.locale.labels.section_time = "Fecha de inicio y la duración";
    gantt.locale.labels.section_description = "Nombre descriptivo de la tarea";    gantt.locale.labels.section_equipo = "Asignación de miembros";
    gantt.locale.labels.section_indicador = "Indicador que requerirá esta tarea";
    gantt.locale.labels.section_tipo = "Tipo de tarea";
    //gantt.locale.labels.section_split = "Es un hito";

    gantt.locale.labels.section_timeH = "Fecha de inicio y la duración";
    
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
    //Evento lanzado cuando se apreta el boton de guardar
    gantt.attachEvent("onLightboxSave", function(id, task, is_new){
    //any custom logic here
        if(task.type!="milestone"){
            if(document.getElementsByName("tipo")[0].checked){
                task.type="milestone";
                //console.log("true");
            }
        }
        
        return true;
    })
    //Evento lanzado despues de que se mueve una tarea pero antes 
    // gantt.attachEvent("onBeforeTaskChanged", function(id, mode, task){
    //     //any custom logic here
    //     return true;
    // });
    gantt.attachEvent("onBeforeTaskDrag", function(id, mode, e){
        return false;           //allows dragging if the global task index is even
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
        {name: "description", height: 70, map_to: "text", type: "textarea", focus: true},
        {name: "timeH", type: "duration", single_date: true, map_to: "auto"}
    ];

    //Deshabilitar boton de guardar y eliminar
    gantt.config.buttons_left = ["dhx_cancel_btn"];
    gantt.config.buttons_right = [];
    //Scroll
    gantt.config.autoscroll = true;
    gantt.config.autoscroll_speed = 50;
    //Readonly
    //gantt.config.readonly = true;
     //Inicializa el gant
    gantt.init("gantt_here");
    //Llamar al controlador para llenar los datos, aca paso por parametro el id del proyecto seleccionado
    gantt.load("/api/data/{{$idProyecto}}");
    gantt.config.scale_unit = "week"; //display by year
    gantt.config.step = 1; //Set the step size of the time scale (X axis)
    gantt.config.date_scale = "%w"; //date scale by year */
    //Sirve para habilitar guardar informacion en la base
    var dp = new gantt.dataProcessor("/api");
    dp.init(gantt);
    dp.setTransactionMode("REST");
        
    /*https://docs.dhtmlx.com/gantt/snippet/1c3e1c28
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

    /*las siguientes 3 lineas son para que la escala del gantt sea en meses, por defecto es de días, o se puede poner en años con "year" o semanas "week" en la 1ra y "%Y" o "%w" en la 3ra linea
    gantt.config.scale_unit = "month"; //display by year
    gantt.config.step = 1; //Set the step size of the time scale (X axis)
    gantt.config.date_scale = "%m"; //date scale by year */
    
    //para agregar, modificar y eliminar tareas https://docs.dhtmlx.com/gantt/desktop__custom_edit_form.html
    
   
</script>

</body>

@endsection