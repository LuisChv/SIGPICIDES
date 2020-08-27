@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
    Nueva investigación
@endsection
@section('content')
<div class="row">
    <div class="col-12">
            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-12 text-left">
                            <h2 class="card-title"><b>Planificación</b></h2>
                        </div>
                    </div>
                </div>
                <form class="form" method="POST" action="">
                    @csrf                                    
                    <div class="card-body">
                        <button class="btn btn-primary"> <i class="tim-icons icon-simple-add"></i> Indicador</button>
                        <button class="btn btn-primary"> <i class="tim-icons icon-simple-add"></i> Hito</button>
                        <br>
                        <ul class="nav nav-tabs border-primary">
                          <li class="nav-item">
                            <a class="nav-link" href="{{route('planificacion.index')}}">Hitos</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">Indicadores</a>
                          </li>
                        </ul>
                        <table class="table">
                            <tr class="text-center">
                                <th class="text-left">Nombre</th>
                                <th>Progreso</th>
                                <th>Acciones</th>
                            </tr>
                            <tr>
                                <td>Indicador 1</td>
                                <td class="text-center">
                                    <div class="progress">
                                      <div class="progress-bar bg-danger" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-success btn-sm btn-icon btn-round"><i class="tim-icons icon-pencil"></i></a>
                                    <a href="#" class="btn btn-warning btn-sm btn-icon btn-round"><i class="tim-icons icon-simple-remove"></i></a>
                                    </td>
                            </tr>
                            <tr>
                                <td>Indicador 2</td>
                                <td class="text-center">
                                    <div class="progress">
                                      <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-success btn-sm btn-icon btn-round"><i class="tim-icons icon-pencil"></i></a>
                                    <a href="#" class="btn btn-warning btn-sm btn-icon btn-round"><i class="tim-icons icon-simple-remove"></i></a>
                                    </td>
                            </tr>
                            <tr>
                                <td>Indicador 3</td>
                                <td class="text-center">
                                    <div class="progress">
                                      <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-success btn-sm btn-icon btn-round"><i class="tim-icons icon-pencil"></i></a>
                                    <a href="#" class="btn btn-warning btn-sm btn-icon btn-round"><i class="tim-icons icon-simple-remove"></i></a>
                                    </td>
                            </tr>
                        </table>
                    </div>

                    <div class="card-footer">
                        <a class="btn btn-primary" href="{{route('solicitud.index')}}">Siguiente &nbsp;&nbsp;&nbsp;<i class="tim-icons icon-double-right font-weight-bold"></i></a> <br><br>     
                    </div>                    
                </form>
            </div>
        </div>
        <div class="container menuF-container">
            <input type="checkbox" id="toggleF">
            <label for="toggleF" class="buttonF"></label>
            <nav class="navF">
                <a href="{{ route('solicitud.create')}}">Recursos</a>
                <a href="{{ route('solicitud.create')}}">Factibilidad</a>
                <a href="{{ route('miembros.index')}}">Miembros</a>
                <a href="{{ route('solicitud.create')}}">Planificación</a>
                <!--a href="{{ route('cides') }}">Acerca de</a>
                <a href="#">Acciones largaaaaaaaaas</a-->
            </nav>
        </div>
</div>
@endsection