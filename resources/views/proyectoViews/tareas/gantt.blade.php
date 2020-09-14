@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
    Nueva investigación
@endsection
@section('content')
<!DOCTYPE html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
 
    <script src="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.js"></script>
    <link href="https://cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.css" rel="stylesheet">
 
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
    gantt.config.date_format = "%Y-%m-%d %H:%i:%s";
    gantt.config.order_branch = true;
    gantt.config.order_branch_free = true;
    
    

   gantt.config.columns = [
        { name:"text", tree:true, width:"*",map_to:"text",  resize:true },
        { name:"start_date", align:"center"},
       // { name:"rrhh", align:"center"},
        { name:"duration", align:"center", width:40 },
        { name:"add", width:44 }
    ];

    gantt.locale.labels.section_avance = "Avance de la tarea detallado";
    gantt.locale.labels.section_time = "Tiempo";
    gantt.locale.labels.section_description = "Descripción";
    gantt.locale.labels.section_split = "Asignación de miembros";


    gantt.config.lightbox.sections=[
        {name:"description", height:70, map_to:"text", type:"textarea", focus:true},
        {name:"time", height:40, map_to:"auto", type:"duration"},
      //  {name:"avance", height:70, map_to:"avance", type:"textarea"},
        {name: "split", type:"checkbox", height:40, map_to: "render", options:[    
            @php
                for ($i = 0; $i < 5; $i++)
                    echo '{key:"op'. $i .'", label:" Split' . $i . '&nbsp;&nbsp; "},'
            @endphp
        ]},
    ];

    gantt.init("gantt_here");
    
    gantt.load("/api/data");
    
    var dp = new gantt.dataProcessor("/api");
    dp.init(gantt);
    dp.setTransactionMode("REST");
</script>
</body>

@endsection