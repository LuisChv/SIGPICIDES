@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('title')
    Próximamente
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-12 text-left">
                            <h2 class="card-title, font-weight-bold">Proyectos</h2>
                            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="main_nav">                                
                                    <ul class="navbar-nav">                                
                                    <li class="nav-item dropdown">
                                        <a class="btn btn-secondary dropdown-toggle" href="#" data-toggle="dropdown">  Filtrar por:  </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Todos los proyectos</a>
                                        @foreach ($tiposProy as $tipo)
                                            <li><a class="dropdown-item" href="#">{{$tipo->nombre}}</a>
                                                <ul class="submenu dropdown-menu">
                                                    @foreach ($subtiposProy as $subtipo)
                                                        @if ($subtipo->id_tipo==$tipo->id)
                                                        <li><a class="dropdown-item" href="#">{{$subtipo->nombre}}</a></li>    
                                                        @endif
                                                    @endforeach                                                
                                                </ul>
                                            </li>
                                        @endforeach                                                                               
                                        </ul>
                                    </li>                                                     
                                    </ul>
                                    <input autocomplete="off" id="buscador2" class="form-control" name="proyectoNombre" 
                                    placeholder="Buscar nombre del proyecto" onclick="ejecutarBuscador({{json_encode($proyectos)}},'nombre' ,'buscador2')">                           
                                </div> <!-- navbar-collapse.// -->
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
                        @foreach ($proyectos as $proyecto)
                        <tr>
                            <td>{{$proyecto->nombre}}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary btn-sm btn-round btn-icon" title="Información general"><i class="tim-icons icon-notes"></i></a>
                                    <a href="{{route('tareas_avance.index', $proyecto->id)}}" class="btn btn-primary btn-sm btn-round btn-icon" title="Planificación & avances"><i class="tim-icons icon-map-big"></i></a>
                                    <button onclick="confirmar()" class="btn btn-danger btn-sm btn-round btn-icon" title="Eliminar proyecto"><i class="tim-icons icon-simple-remove"></i></button>
                                </div>
                            </td>
                        </tr>    
                        @endforeach
                        <tr>
                            <td>Proyecto de investigación sobre porque mi gato no se llama Anvorgueso</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary btn-sm btn-round btn-icon" title="Información general"><i class="tim-icons icon-notes"></i></a>
                                    <a href="{{route('tareas_avance.index', 1)}}" class="btn btn-primary btn-sm btn-round btn-icon" title="Planificación & avances"><i class="tim-icons icon-map-big"></i></a>
                                    <button onclick="confirmar()" class="btn btn-danger btn-sm btn-round btn-icon" title="Eliminar proyecto"><i class="tim-icons icon-simple-remove"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Proyecto de investigación sobre porque mi gato no se llama Milaneso</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary btn-sm btn-round btn-icon" title="Información general"><i class="tim-icons icon-notes"></i></a>
                                    <a href="{{route('tareas_avance.index', 1)}}" class="btn btn-primary btn-sm btn-round btn-icon" title="Planificación & avances"><i class="tim-icons icon-map-big"></i></a>
                                    <button onclick="confirmar()" class="btn btn-danger btn-sm btn-round btn-icon" title="Eliminar proyecto"><i class="tim-icons icon-simple-remove"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Proyecto de investigación sobre por qué los gatos ronronean</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary btn-sm btn-round btn-icon" title="Información general"><i class="tim-icons icon-notes"></i></a>
                                    <a href="{{route('tareas_avance.index', 1)}}" class="btn btn-primary btn-sm btn-round btn-icon" title="Planificación & avances"><i class="tim-icons icon-map-big"></i></a>
                                    <button onclick="confirmar()" class="btn btn-danger btn-sm btn-round btn-icon" title="Eliminar proyecto"><i class="tim-icons icon-simple-remove"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Proyecto de investigación sobre encontrar tuber: tuberdaderoamor</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary btn-sm btn-round btn-icon" title="Información general"><i class="tim-icons icon-notes"></i></a>
                                    <a href="{{route('tareas_avance.index', 1)}}" class="btn btn-primary btn-sm btn-round btn-icon" title="Planificación & avances"><i class="tim-icons icon-map-big"></i></a>
                                    <button onclick="confirmar()" class="btn btn-danger btn-sm btn-round btn-icon" title="Eliminar proyecto"><i class="tim-icons icon-simple-remove"></i></button>
                                </div>
                            </td>
                        </tr>
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