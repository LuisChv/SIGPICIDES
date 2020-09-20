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
<body>
    <input type="hidden" name="idProyecto" value="{{$idProyecto}}">
        <div id="gantt_here" style='width:100%; height:510px;'></div>
        <br>
            <table width="100%">
                <tr>
                    <td width="50%">
                        <a class="btn btn-primary" href="{{ route('proyecto_tareas.index', [$idProyecto]) }}">
                            Anterior
                        </a>
                    </td>
                    <td width="50%" align="right">
                        <a class="btn btn-primary" href="">
                            Enviar
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