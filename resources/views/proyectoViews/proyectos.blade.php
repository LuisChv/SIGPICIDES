@extends('layouts.app', ['pageSlug' => 'proyectos'])

@section('title')
    Proyectos
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-12 text-left">
                            <h2 class="card-title, font-weight-bold">Proyectos</h2>
                            <div><input autocomplete="off" id="buscador2" class="form-control" name="proyectoNombre" 
                                placeholder="Buscar nombre del proyecto" onclick="ejecutarBuscador({{json_encode($proyectosBuscador)}},'nombre' ,'buscador2','filtroProyectos')">
                            </div>
                            <br>                         
                            <nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded">                                
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <form action="{{ route('proyectos.filtros')}}" id="formFiltrarProyecto" method="get">                                
                                    <div class="collapse navbar-collapse" id="main_nav">                                
                                        <ul class="navbar-nav">                                
                                        <li class="nav-item dropdown">
                                            <p id="botonSeleccionadorProyectoFiltro" class="btn btn-secondary text-white" data-toggle="dropdown">{{$nombreElegido ?? 'Todos los proyectos'}} &nbsp;<i class="tim-icons icon-minimal-down"></i></p>
                                            <ul class="dropdown-menu">
                                                <li><a onclick="filtrotipo(this,0)" class="dropdown-item text-dark">Todos los proyectos</a>
                                            @foreach ($tiposProy as $tipo)
                                                <li><a  onclick="filtrotipo(this,1)" class="dropdown-item text-dark">{{$tipo->nombre}}</a>
                                                    <ul class="submenu dropdown-menu">
                                                        @foreach ($subtiposProy as $subtipo)
                                                            @if ($subtipo->id_tipo==$tipo->id)
                                                            <li><a onclick="filtrotipo(this,2)" class="dropdown-item text-dark">{{$subtipo->nombre}}</a></li>    
                                                            @endif
                                                        @endforeach                                                
                                                    </ul>
                                                </li>
                                            @endforeach                                                                               
                                            </ul>
                                        </li>                                                     
                                        </ul>                                    
                                        <input name="nombre" id="ocultoNombreProyecto" value="{{$nombreElegido ?? 'Todos los proyectos'}}" type="text" hidden>
                                        <input name="tisubti" id="ocultoTipoProyecto" value="{{$tisubtiElegido ?? '0'}}" type="text" hidden>
                                        <select name="estadoProy" id="estadoProy" class="botondash"> 
                                            <option value="0">Todos los estados</option>
                                            @foreach ($estados as $estado)
                                            @if ($estado->id==$estadoElegido)
                                            <option value="{{$estado->id}}" selected>{{$estado->estado}}</option>    
                                            @else
                                            <option value="{{$estado->id}}">{{$estado->estado}}</option>
                                            @endif                                        
                                            @endforeach                                
                                        </select>
                                        <button class="btn btn-default botondash2" type="submit" form="formFiltrarProyecto">Buscar</button>                                    
                                    </div> <!-- navbar-collapse.// -->
                                </form>
                            </nav>
                        </div>                        
                        <p>&nbsp;</p><br>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Proyecto</th>
                            <th>Acciones</th>
                        </tr>
                        <div class="container">
                            @foreach ($proyectos as $proyecto)
                            <tr>
                                <td>{{$proyecto->nombre}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('proyecto.resumen', $proyecto->id)}}" class="btn btn-primary btn-sm btn-round btn-icon" title="Información general"><i class="tim-icons icon-notes"></i></a>
                                        <a href="{{route('tareas_avance.index', $proyecto->id)}}" class="btn btn-primary btn-sm btn-round btn-icon" title="Planificación & avances"><i class="tim-icons icon-map-big"></i></a>
                                        <button onclick="confirmar()" class="btn btn-danger btn-sm btn-round btn-icon" title="Eliminar proyecto"><i class="tim-icons icon-simple-remove"></i></button>
                                    </div>
                                </td>
                            </tr>    
                            @endforeach
                        </div>
                        {{ $proyectos->links() }}
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection

@push('js')
    <script src="{{ asset('black') }}/js/plugins/chartjs.min.js"></script>
    <script>
        $(document).ready(function() {
          demo.initDashboardPageCharts();
        });
    </script>
@endpush