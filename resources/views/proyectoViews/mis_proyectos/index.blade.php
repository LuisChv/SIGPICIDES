@extends('layouts.app', ['pageSlug' => 'mis_proyectos'])

@section('title')
    Mis proyectos
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h2 class="card-title"><b>Proyectos de investigación</b></h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">             
                        <tr>
                            <th>Proyecto</th>
                            <th>Acciones</th>
                        </tr>
                        @foreach($proyectos as $proyecto)
                            <tr>
                                <td>{{$proyecto->nombre}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('solicitud.resumen', $proyecto->id)}}" class="btn btn-primary btn-sm btn-round btn-icon" title="Información general"><i class="tim-icons icon-notes" style="color:white"></i></a>
                                        <a href="{{route('tareas_avance.index', $proyecto->id)}}" class="btn btn-primary btn-sm btn-round btn-icon" title="Planificación & avances"><i class="tim-icons icon-map-big"></i></a>
                                        <a href="#" class="btn btn-primary btn-sm btn-round btn-icon" title="Indicadores"><i class="tim-icons icon-chart-bar-32"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection