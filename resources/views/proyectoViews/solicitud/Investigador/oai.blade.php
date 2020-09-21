@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
	Consultar solicitudes 
@endsection
@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card"  id="objetivosCard">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-9 text-left">
                        <h2 class="card-title"><b>Objetivos</b></h2>
                    </div>
                    <div class="col-sm-3 text-right">
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalObjetivo">+</button>
                        <form method="POST" action="{{route('proyecto_objetivos.store')}}">
                            @csrf
                            <div class="modal fade" id="modalObjetivo" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Nuevo objetivo</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="false">&times;</span>
                                                </button>
                                        </div>
                                        <div class="modal-body">                     
                                            <table class="table" style="background-color: white !important;" >
                                                <tr>
                                                    <td width="60%"><textarea required rows="3" style="color: #222a42 !important;" placeholder="Descripción del objetivo" class="form-control border border-light rounded" name="descripcion_objetivo"></textarea></td>
                                                </tr>
                                                <input hidden name="id_proy" value="{{$id}}"/>
                                            </table>
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
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    @foreach ($objetivos as $objetivo)
                        <tr>
                            <td class="align-content-xl-between"><i class="tim-icons icon-compass-05"></i></td>
                            <td>
                                {{$objetivo->descripcion}}
                            </td>
                            <form id="formulario_objetivo{{$objetivo->id}}" method="POST" action="{{route('proyecto_objetivos.destroy')}}">
                                @csrf
                                @method('DELETE')
                                <td class="text-right">
                                    <input hidden name="objetivo" value="{{$objetivo->id}}"/>
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-success btn-sm btn-round btn-icon" data-toggle="modal" data-target="#modalEditarObjetivo" onclick="editarObjetivo({{$objetivo->id}},'{{$objetivo->descripcion}}')">
                                            <i class="tim-icons icon-pencil"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-warning btn-round btn-icon" onclick="confirmar('_objetivo{{$objetivo->id}}')">
                                            <i class="tim-icons icon-simple-remove"></i>
                                        </button>
                                    </div>
                                    
                                </td>
                            </form>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card" id="alcancesCard">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-9 text-left">
                        <h2 class="card-title"><b>Alcances</b></h2>
                    </div>
                    <div class="col-sm-3 text-right">
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAlcance">+</button>
                        <form method="POST" action="{{route('proyecto_alcances.store')}}">
                            @csrf
                            <div class="modal fade" id="modalAlcance" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Nuevo alcance</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="false">&times;</span>
                                                </button>
                                        </div>
                                        <div class="modal-body" >                     
                                            <table class="table" style="background-color: white !important;" >
                                                <tr>
                                                    <td width="60%"><textarea required rows="3" style="color: #222a42 !important;" class="form-control border border-light rounded" name="descripcion_alcance"></textarea></td>
                                                </tr>
                                                <input hidden name="id_proy" value="{{$id}}"/>
                                            </table>
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
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    @foreach ($alcances as $alcance)
                        <tr>
                            <td class="align-text-top"><i class="tim-icons icon-wifi"></i></td>
                            <td>
                                {{$alcance->descripcion}}
                            </td>
                            <form id="formulario_alcance{{$alcance->id}}" method="POST" action="{{route('proyecto_alcances.destroy')}}">
                                @csrf
                                @method('DELETE')
                                <td class="text-right">
                                    <input hidden name="alcance" value="{{$alcance->id}}"/>
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-success btn-sm btn-round btn-icon" data-toggle="modal" data-target="#modalEditarAlcance" onclick="editarAlcance({{$alcance->id}},'{{$alcance->descripcion}}')">
                                            <i class="tim-icons icon-pencil"></i>
                                        </button>
                                        <button type="button" class="btn btn-warning btn-sm btn-round btn-icon" onclick="confirmar('_alcance{{$alcance->id}}')">
                                            <i class="tim-icons icon-simple-remove"></i>
                                        </button>
                                    </div>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card" id="indicadoresCard">

            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-9 text-left">
                        <h2 class="card-title"><b>Indicadores</b></h2>
                    </div>
                    <div class="col-sm-3 text-right">
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalIndicador">+</button>
                        <form method="POST" action="{{route('proyecto_indicadores.store')}}">
                            @csrf
                            <div class="modal fade" id="modalIndicador" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Nuevo indicador</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="false">&times;</span>
                                                </button>
                                        </div>
                                        <div class="modal-body" >                     
                                            <table class="table" style="background-color: white !important;" >
                                                                                               
                                                <tr>
                                                    <td><textarea required placeholder=" Descripción del indicador" rows="3" style="color: #222a42 !important;" class="form-control border border-light rounded" name="descripcion_indicador"></textarea></td>
                                                </tr>
                                                <input hidden name="id_proy" value="{{$id}}"/>
                                            </table>
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
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    @foreach ($indicadores as $indicador)
                        <tr>
                            <td class="align-text-top"><i class="tim-icons icon-sound-wave"></i></td>
                            <td>
                                {{$indicador->detalle}}
                            </td>
                            <form id="formulario_indicador{{$indicador->id}}" method="POST" action="{{route('proyecto_indicadores.destroy')}}">
                                @csrf
                                @method('DELETE')
                                <td class="text-right">
                                    <input hidden name="indicador" value="{{$indicador->id}}"/>
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-success btn-sm btn-round btn-icon" data-toggle="modal" data-target="#modalEditarIndicador" onclick="editarIndicador({{$indicador->id}},'{{$indicador->detalle}}')">
                                            <i class="tim-icons icon-pencil"></i>
                                        </button>
                                        
                                        <button type="button" class="btn btn-warning btn-sm btn-round btn-icon" onclick="confirmar('_indicador{{$indicador->id}}')">
                                            <i class="tim-icons icon-simple-remove"></i>
                                        </button>
                                    </div>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
<!--formularios de edicion-->
<form method="POST" action="{{route('proyecto_objetivos.update')}}">
    @csrf
    @method('PUT')
    <div class="modal fade" id="modalEditarObjetivo" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar objetivo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="false">&times;</span>
                        </button>
                </div>
                <div class="modal-body" >                     
                    <table class="table" style="background-color: white !important;" >
                                                                                               
                        <tr>
                            <td><textarea required placeholder="Descripción del objetivo" rows="3" style="color: #222a42 !important;" class="form-control border border-light rounded" name="descripcion_objetivo" id="editarDetalleObjetivo"></textarea>
                            </td>
                        </tr>
                        <input hidden name="id_objetivo" id="editarIdObjetivo"/>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form method="POST" action="{{route('proyecto_alcances.update')}}">
    @csrf
    @method('PUT')
    <div class="modal fade" id="modalEditarAlcance" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar alcance</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="false">&times;</span>
                        </button>
                </div>
                <div class="modal-body" >                     
                    <table class="table" style="background-color: white !important;" >
                                                                                               
                        <tr>
                            <td><textarea required placeholder="Descripción del alcance" rows="3" style="color: #222a42 !important;" class="form-control border border-light rounded" name="descripcion_alcance" id="editarDetalleAlcance"></textarea>
                            </td>
                        </tr>
                        <input hidden name="id_alcance" id="editarIdAlcance"/>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form method="POST" action="{{route('proyecto_indicadores.update')}}">
    @csrf
    @method('PUT')
    <div class="modal fade" id="modalEditarIndicador" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar indicador</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="false">&times;</span>
                        </button>
                </div>
                <div class="modal-body" >                     
                    <table class="table" style="background-color: white !important;" >
                                                                                               
                        <tr>
                            <td><textarea required placeholder=" Descripción del indicador" rows="3" style="color: #222a42 !important;" class="form-control border border-light rounded" name="descripcion_indicador" id="editarDetalleIndicador"></textarea></td>
                        </tr>
                        <input hidden name="id_indicador" id="editarIdIndicador"/>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
</form>

<table class="col-md-12">
    <tr>
        <td width="50%">
            <a class="btn btn-primary" href="{{ route('solicitud.edit', [$id])}}">
                Anterior
            </a>
        </td>
        <td width="50%" align="right">
            <a class="btn btn-primary" href="{{ route('proyecto_recursos.create', [$id])}}">
                Siguiente
            </a>
        </td>
    </tr>
</table>
<script src="{{ asset('black') }}/js/oai.js"></script>

@endsection
