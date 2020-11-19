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
                        <tr>
                            <td>Proyecto de investigación sobre porque mi gato no se llama Anvorgueso</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-primary btn-sm btn-round btn-icon" title="Información general"><i class="tim-icons icon-notes"></i></a>
                                    <button onclick="confirmar()" class="btn btn-primary btn-sm btn-round btn-icon" title="Este boton es solo para un CPU luego lo quitan"><i class="tim-icons icon-check-2"></i></button>
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