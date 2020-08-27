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
                            <a class="nav-link" href="#">Hitos</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{route('indicadores.index')}}">Indicadores</a>
                          </li>
                        </ul>
                        <table class="table">
                            <tr class="text-center">
                                <th class="text-left">Título</th>
                                <th>Fecha límite</th>
                                <th>Acciones</th>
                            </tr>
                            <tr>
                                <td>Planteamiento del problema</td>
                                <td class="text-center">30/8/2020</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-success btn-sm btn-icon btn-round"><i class="tim-icons icon-pencil"></i></a>
                                    <a href="#" class="btn btn-warning btn-sm btn-icon btn-round"><i class="tim-icons icon-simple-remove"></i></a>
                                    </td>
                            </tr>
                            <tr>
                                <td>Visualización del alcance de estudio</td>
                                <td class="text-center">16/9/2020</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-success btn-sm btn-icon btn-round"><i class="tim-icons icon-pencil"></i></a>
                                    <a href="#" class="btn btn-warning btn-sm btn-icon btn-round"><i class="tim-icons icon-simple-remove"></i></a>
                                    </td>
                            </tr>
                            <tr>
                                <td>Elaboración de hipótesis de estudio</td>
                                <td class="text-center">18/9/2020</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-success btn-sm btn-icon btn-round"><i class="tim-icons icon-pencil"></i></a>
                                    <a href="#" class="btn btn-warning btn-sm btn-icon btn-round"><i class="tim-icons icon-simple-remove"></i></a>
                                    </td>
                            </tr>
                            <tr>
                                <td>Definición de la muestra</td>
                                <td class="text-center">20/9/2020</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-success btn-sm btn-icon btn-round"><i class="tim-icons icon-pencil"></i></a>
                                    <a href="#" class="btn btn-warning btn-sm btn-icon btn-round"><i class="tim-icons icon-simple-remove"></i></a>
                                    </td>
                            </tr>
                            <tr>
                                <td>Recolección de los datos</td>
                                <td class="text-center">25/9/2020</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-success btn-sm btn-icon btn-round"><i class="tim-icons icon-pencil"></i></a>
                                    <a href="#" class="btn btn-warning btn-sm btn-icon btn-round"><i class="tim-icons icon-simple-remove"></i></a>
                                    </td>
                            </tr>
                            <tr>
                                <td>Análisis de los datos</td>
                                <td class="text-center">10/10/2020</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-success btn-sm btn-icon btn-round"><i class="tim-icons icon-pencil"></i></a>
                                    <a href="#" class="btn btn-warning btn-sm btn-icon btn-round"><i class="tim-icons icon-simple-remove"></i></a>
                                    </td>
                            </tr>
                        </table>
                    </div>

                    <div class="card-footer">
                        <a class="btn btn-primary" href="{{route('solicitud.show2')}}">Siguiente &nbsp;&nbsp;&nbsp;<i class="tim-icons icon-double-right font-weight-bold"></i></a> <br><br>     
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