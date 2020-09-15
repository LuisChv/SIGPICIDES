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
    <link rel="stylesheet" href="https://files.dhtmlx.com/30d/0801b74b161df383f7de350535901db6/dhtmlxgantt_contrast_black.css">
    <link href="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.css" rel="stylesheet">
    <script src="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.js"></script>
    
    <style type="text/css">
        html, body{
            height:100%;
            padding:0px;
            margin:0px;
            overflow: hidden;
        }
    </style>
    
</head>


<body>
<div id="gantt_here" style='width:100%; height:510px;'></div>
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
        {name: "indicador", type:"checkbox", height:40, map_to: "render", options:[                
            @php
                    for ($i = 0; $i < sizeof($indicadores); $i++)
                    echo '{key:"op'. $i .'", label:"' . $indicadores[$i]->detalle . '&nbsp;&nbsp; "},'
            @endphp
        ]},
        //Para agrega a los miembros del equipo
        {name: "equipo", type:"checkbox", height:40, map_to: "render", options:[    
            @php
                for ($i = 0; $i < sizeof($miembrosEquipo); $i++)
                    echo '{key:"op'. $i .'", label:"' . $miembrosEquipo[$i]->name . '&nbsp;&nbsp; "},' 
                    
            @endphp
        ]},
    ];
    
    /*las siguientes 3 lineas son para que la escala del gantt sea en meses, por defecto es de días, o se puede poner en años con "year" o semanas "week" en la 1ra y "%Y" o "%w" en la 3ra linea
    gantt.config.scale_unit = "month"; //display by year
    gantt.config.step = 1; //Set the step size of the time scale (X axis)
    gantt.config.date_scale = "%m"; //date scale by year */
    
    //para agregar, modificar y eliminar tareas https://docs.dhtmlx.com/gantt/desktop__custom_edit_form.html
    
    //Inicializa el gant
    gantt.init("gantt_here");
    //Llamar al controlador para llenar los datos, aca paso por parametro el id del proyecto seleccionado
    gantt.load("/api/data/{{$idProyecto}}");
    //Sirve para habilitar guardar informacion en la base
    var dp = new gantt.dataProcessor("/api");
    dp.init(gantt);
    dp.setTransactionMode("REST");
</script>

</body>

@endsection