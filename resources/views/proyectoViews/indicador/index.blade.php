@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
Indicadores
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-12 text-left">
                        <h2 class="card-title">Indicadores</h2>
                        <p><i>Progreso</i></p>
                        <div class="progreso_container">
                            <div class="progress">
                                <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                            </div>
                        </div>
                    </div>
                    <p>&nbsp;</p><br>
                </div>
            </div>
        </div>
    </div>
    @foreach ($indicadores as $indicador) 

        <!-- INICIO DE IF A -->
        @if ($indicador->modificable)
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-justify">
                                <h5>{{$indicador->detalle}}</h5>
                            </div>

                            <!-- INICIO DE IF A.1 -->
                            @if($indicador->tipo)
                                <div class="col-md-6">
                                    Tipo de indicador: 
                                </div>
                                <div class="col-md-6 text-right">
                                    <div class="btn-group">
                                        <a href="{{ route('indicador.tipo', $indicador->id) }}" class="btn btn-primary btn-sm">Cualitativo</a>
                                        <a disabled href="{{ route('indicador.tipo', $indicador->id) }}" class="btn btn-primary btn-sm">Cuantitativo</a>
                                    </div>
                                </div>

                                <!-- INICIO DE IF A.1.1 -->
                                @if($indicador->tipo_de_grafico)
                                    <div class="col-md-6">
                                        Tipo de gráfico: 
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <div class="btn-group">
                                            <a href="{{ route('indicador.tipo_grafico', $indicador->id) }}" class="btn btn-primary btn-sm">Líneas</a>
                                            <a disabled href="{{ route('indicador.tipo_grafico', $indicador->id) }}" class="btn btn-primary btn-sm">Barras</a>
                                        </div>
                                    </div>

                                <!-- INICIO DE ELSE A.1.1  -->
                                @else
                                    <div class="col-md-6">
                                        Tipo de gráfico: 
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <div class="btn-group">
                                            <a disabled href="{{ route('indicador.tipo_grafico', $indicador->id) }}" class="btn btn-primary btn-sm">Líneas</a>
                                            <a href="{{ route('indicador.tipo_grafico', $indicador->id) }}" class="btn btn-primary btn-sm">Barras</a>
                                        </div>
                                    </div>
                                @endif
                                <!-- FIN DE IF A.1.1  -->

                                <div class="col-md-12">
                                    <hr>
                                </div>
                                <div class="col-md-8">
                                    Variables
                                </div>
                                <div class="col-md-4 text-right">
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalVariable">+</button>
                                    <form method="POST" action="{{route('indicador.variable')}}">
                                        @csrf
                                        <div class="modal fade" id="modalVariable" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Agregar variable</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="false">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" >                     
                                                        <div class="row">
                                                            <div class="mr-auto ml-auto col-md-6">
                                                                <input required id="nombre" class="form-control" placeholder="Nombre" name="nombre">
                                                            </div>
                                                            <div class="mr-auto ml-auto col-md-6">
                                                                <input pattern="[0-F]{6}" maxlength="6" id="color" class="form-control" placeholder="Color (2395FC)" name="color">
                                                            </div>
                                                            <input hidden name="id_indicador" value="{{$indicador->id}}"/>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-primary">Añadir</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form> 
                                </div>
                                <div class="col-md-12">
                                    <table class="table">
                                        @foreach ($variables as $variable)

                                        <!-- INICIO DE IF A.1.2  -->
                                            @if ($variable->id_indicador)
                                                <tr>
                                                    <td>
                                                        {{$variable->nombre}}
                                                    </td>
                                                    <td class="text-right">
                                                        <a disabled href="#" class="btn btn-sm btn-round btn-icon" style="background:#{{$variable->color}}"><i class="fas fa-tint"></i></a>
                                                    </td>
                                                    <form id="formulario_variable{{$variable->id}}" method="POST" action="{{route('variable.destroy')}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <td class="text-right">
                                                            <input hidden name="variable" value="{{$variable->id}}"/>
                                                            <button type="button" class="btn btn-warning btn-sm btn-round btn-icon" onclick="confirmar('_variable{{$variable->id}}')">
                                                                <i class="tim-icons icon-simple-remove"></i>
                                                            </button>
                                                        </td>
                                                    </form>
                                                </tr>
                                            @endif
                                        <!-- FIN DE IF A.1.2  -->

                                        @endforeach
                                    </table>
                                </div>

                            <!-- INICIO DE ELSE A.1 -->
                            @else
                                <div class="col-md-6">
                                    Tipo de indicador: 
                                </div>
                                <div class="col-md-6 text-right">
                                    <div class="btn-group">
                                        <a disabled href="{{ route('indicador.tipo', $indicador->id) }}" class="btn btn-primary btn-sm">Cualitativo</a>
                                        <a href="{{ route('indicador.tipo', $indicador->id) }}" class="btn btn-primary btn-sm">Cuantitativo</a>
                                    </div>
                                </div>
                            @endif
                            <!-- FIN DE IF A.1 -->

                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="{{ route('indicador.confirmar', $indicador->id) }}" class="btn btn-primary">Confirmar</a>
                    </div>
                    <br>
                </div>
            </div>
        <!-- ELSE DE IF A -->
        @else
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3>{{$indicador->detalle}}</h3>

                        <!-- INICIO DE IF A.2 -->
                        @if ($indicador->tipo_de_grafico)
                            <div class="col-md-12 text-right">
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalBarra">Modificar datos</button>
                                <form method="POST" action="{{route('datos.barra')}}">
                                    @csrf
                                    <div class="modal fade" id="modalBarra" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Modificar datos</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="false">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" >   
                                                    <div class="row">                
                                                        @foreach ($variables as $variable)
                                                            <!-- INICIO DE IF A.2.1  -->
                                                            @if ($variable->id_indicador)
                                                                <div class="col-md-3">
                                                                    {{$variable->nombre}}
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input required name="{{$variable->id}}" class="form-control form-control-sm" type="number" step="0.01" value="{{$variable->valor_y}}">
                                                                </div>
                                                            @endif
                                                        <!-- FIN DE IF A.2.1  -->

                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input hidden name="indicador" value="{{$indicador->id}}">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        <!-- INICIO DE ELSE A.2 -->
                        @else
                            <div class="col-md-12">
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Variables
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    @foreach ($variables as $variable)
                                        
                                            <!-- INICIO DE IF A.2.2 -->
                                        @if($variable->id_indicador == $indicador->id)
                                            <button type="button" class="form-control" data-toggle="modal" data-target="#modalLinea" onclick="modalLinea({{$variable->id}})">
                                                {{$variable->nombre}}
                                            </button>                                   
                                        @endif
                                            <!-- FIN DE IF A.2.2 -->
    
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                        <!--  FIN DE IF A.2 -->
                        <br>
                    </div>
                </div>
            </div>
        @endif
        <!-- FIN DE IF A -->    

    @endforeach
        <!--fin cajita-->
        <!--plantilla para indicador cuantitativo-->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="indicador">
                            <div class="indicador__grafica">[Gráfica]</div>
                            <div><p><b>Descripción:</b></p>
                                <p>Descripcion de prueba</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--fin plantilla indicador cuantitativo-->
            <!--plantilla indicador cualitativo-->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header ">
                        <div class="row">
                            <div class="indicador">
                                <div><p><b>Descripción:</b></p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                </div>
                                <div><p><b>Descripción final:</b></p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                </div>
                                <div>
                                    <hr>
                                    <p><b>Archivos:</b></p>
                                    <table>
                                        <tr>
                                            <td><p>Documentos: 0</p></td>
                                        </tr>
                                        <tr>
                                            <td><p>Hojas de cálculo: 1</p></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--fin plantilla indicador cualitativo-->
            
        </div>

        <form method="POST" action="{{route('proyecto_objetivos.update')}}">
            @csrf
            @method('PUT')
            <div class="modal fade" id="modalLinea" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Editar datos</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="false">&times;</span>
                                </button>
                        </div>
                        <div class="modal-body" >                     
                            <div class="row">
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-4 text-center">
                                    X
                                </div>
                                <div class="col-md-4 text-center">
                                    Y
                                </div>
                                <div class="col-md-4">
                                    Punto 1:
                                </div>
                                <div class="col-md-4">
                                    <input required name="x1" class="form-control form-control-sm" type="number" step="0.01">
                                </div>
                                <div class="col-md-4">
                                    <input required name="y1" class="form-control form-control-sm" type="number" step="0.01">
                                </div>
                                <div class="col-md-4">
                                    Punto 2:
                                </div>
                                <div class="col-md-4">
                                    <input required name="x2" class="form-control form-control-sm" type="number" step="0.01">
                                </div>
                                <div class="col-md-4">
                                    <input required name="y2" class="form-control form-control-sm" type="number" step="0.01">
                                </div>
                                <div class="col-md-4">
                                    Punto 3:
                                </div>
                                <div class="col-md-4">
                                    <input required name="x3" class="form-control form-control-sm" type="number" step="0.01">
                                </div>
                                <div class="col-md-4">
                                    <input required name="y3" class="form-control form-control-sm" type="number" step="0.01">
                                </div>
                                <div class="col-md-4">
                                    Punto 4:
                                </div>
                                <div class="col-md-4">
                                    <input required name="x4" class="form-control form-control-sm" type="number" step="0.01">
                                </div>
                                <div class="col-md-4">
                                    <input required name="y4" class="form-control form-control-sm" type="number" step="0.01">
                                </div>
                                <div class="col-md-4">
                                    Punto 5:
                                </div>
                                <div class="col-md-4">
                                    <input required name="x5" class="form-control form-control-sm" type="number" step="0.01">
                                </div>
                                <div class="col-md-4">
                                    <input required name="y5" class="form-control form-control-sm" type="number" step="0.01">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        
        @endsection
        