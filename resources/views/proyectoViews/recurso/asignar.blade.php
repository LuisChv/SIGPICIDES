@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
	Asignar recursos
@endsection
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header ">
                <h3 class="card-title"><b>Recursos asignados</b></h3>
            </div>
            <div class="card-body">  
                <div id="accordion" role="tablist" aria-multiselectable="true" class="card-collapse">
                    <div class="list-group">
                        @foreach ($tiposrec as $tipo)
                            <div>
                                <table width='100%'>
                                    <tr class="list-group-item list-group-flush" data-toggle="collapse" data-toggle="collapse" data-target="#lista{{ $tipo->id }}" aria-expanded="false" aria-controls="lista{{ $tipo->id }}">
                                        <td>
                                            {{ $tipo->nombre }}&nbsp;&nbsp;
                                            <i class="tim-icons icon-minimal-down"></i>
                                        </td>
                                    </tr>
                                </table>
                                <div id="lista{{ $tipo->id }}" class="collapse" aria-labelledby="rec{{ $tipo->id }}" data-parent="#accordion">
                                    <table width='100%' class="table">
                                        @foreach($recursosProy as $rec)
                                            @if($rec->id_tipo==$tipo->id)  
                                                <tr>                     
                                                    <td id="{{$rec->id}}" data-toggle="modal" data-target="#modalDetalleAsignado{{$rec->id}}" onMouseOver="ResaltarFila({{$rec->id}});" onMouseOut="RestablecerFila({{$rec->id}}, '')">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;<i class="tim-icons icon-planet"></i>
                                                        &nbsp;{{ $rec->nombre }}

                                                        <div class="modal fade" id="modalDetalleAsignado{{$rec->id}}" tabindex="-1" role="dialog" aria-labelledby="label2{{$rec->id}}" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="label2{{$rec->id}}">Detalles del recurso</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="false">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body" >                     
                                                                        <table class="table" style="background-color: white !important;" >
                                                                            <tr>
                                                                                <td class="font-weight-bold" style="color: #222a42 !important;">Nombre</td>
                                                                                <td style="color: #222a42 !important;">{{$rec->nombre}}</td>
                                                                            </tr>
                                                                            
                                                                            <tr>
                                                                                <td style="color: #222a42 !important;" class="font-weight-bold">Cantidad</td>
                                                                                <td style="color: #222a42 !important;">{{ $rec->cantidad }}</td>
                                                                            </tr>
                                                                        <input hidden name="recurso" value="{{$rec->id}}"/>
                                                                        <input hidden name="proyecto" value="{{$proyecto->id}}"/>
                                                                        </table>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                       
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </td>
                                                    <form method="POST" id="formulario{{$rec->id}}" action="{{route('proyecto_recursos.destroy',[$rec->id])}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <td width='10%'>

                                                            <input hidden name="id_proy" val={{$proyecto->id}}>
                                                            <button type="button" onClick="confirmar('{{$rec->id}}')" class="btn btn-warning btn-sm btn-icon btn-round" data-toggle="modal" data-target="#modal{{$rec->id}}"><i class="tim-icons icon-simple-remove"></i></button>
                                                        </td> 
                                                    </form>                                
                                                </tr>
                                            @endif
                                        @endforeach
                                    </table>
                                </div>                      
                            </div>
                        @endforeach
                        <!--fin de dropdown-->
                        </br>
                    </div>                   
                </div>
            </div>
        </div>
    </div>

	<div class="col-6">
        <div class="card">
            <div class="card-header ">
                    <h3 class="card-title"><b>Recursos disponibles</b></h3>              
            </div>
            <div class="card-body">                
                    <!--Dropdown para recurso-->
                <div id="accordion" role="tablist" aria-multiselectable="true" class="card-collapse">
                    <div class="list-group">
                        @foreach ($tiposrec as $tipo)
                            <div>
                                <table width='100%'>
                                    <tr class="list-group-item list-group-flush" data-toggle="collapse" data-toggle="collapse" data-target="#lista2{{ $tipo->id }}" aria-expanded="false" aria-controls="lista{{ $tipo->id }}">
                                        <td>
                                            {{ $tipo->nombre }}&nbsp;&nbsp;
                                            <i class="tim-icons icon-minimal-down"></i>
                                        </td>
                                    </tr>
                                </table>
                                <div id="lista2{{ $tipo->id }}" class="collapse" aria-labelledby="rec{{ $tipo->id }}" data-parent="#accordion">
                                    <table width='100%' class="table">
                                        @foreach($recursos as $rec)
                                            @if($rec->id_tipo==$tipo->id)  
                                                <tr>                     
                                                    <td id={{$rec->id}} onMouseOver="ResaltarFila({{$rec->id}});" onMouseOut="RestablecerFila({{$rec->id}}, '')" onClick="CrearEnlace('{{ route('recursos.show', $rec->id)}}');" >
                                                        &nbsp;&nbsp;&nbsp;&nbsp;<i class="tim-icons icon-planet"></i>
                                                        &nbsp;{{ $rec->nombre }}
                                                    </td>
                                                    <td width='10%'>
                                                        <button type="button" class="btn btn-success btn-sm btn-icon btn-round" data-toggle="modal" data-target="#modal{{$rec->id}}"><i class="tim-icons icon-simple-add"></i></button>
                                                        <!-- Modal -->
                                                        <form method="POST" action="{{route('proyecto_recursos.store')}}">
                                                        @csrf
                                                            <div class="modal fade" id="modal{{$rec->id}}" tabindex="-1" role="dialog" aria-labelledby="label{{$rec->id}}" aria-hidden="true">
                                                              <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                  <div class="modal-header">
                                                                    <h5 class="modal-title" id="label{{$rec->id}}">Nuevo recurso</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                      <span aria-hidden="false">&times;</span>
                                                                    </button>
                                                                  </div>
                                                                  <div class="modal-body" >                     
                                                                    <table class="table" style="background-color: white !important;" >
                                                                        <tr>
                                                                            <td class="font-weight-bold" style="color: #222a42 !important;">Nombre</td>
                                                                            <td style="color: #222a42 !important;">{{$rec->nombre}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="font-weight-bold" style="color: #222a42 !important;" >Detalle</td>
                                                                            <td><textarea style="color: #222a42 !important;" class="form-control border border-light rounded" name="detalle"></textarea></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="color: #222a42 !important;" class="font-weight-bold">Cantidad</td>
                                                                            <td><input style="color: #222a42 !important;" type="number" class=form-control name="cantidad"></td>
                                                                        </tr>
                                                                    <input hidden name="recurso" value="{{$rec->id}}"/>
                                                                    <input hidden name="proyecto" value="{{$proyecto->id}}"/>
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

                                                    </td>                                                   

                                                </tr>
                                            @endif
                                        @endforeach
                                    </table>
                                </div>                      
                            </div>
                        @endforeach
                        <!--fin de dropdown-->
                    </div>                   
                </div>
            </div>
            <div class="card-footer">
                <br>
            </div>
        </div>
    </div>
    @yield('opcion')
</div>
<table class="col-md-12">
    <tr>
        <td width="50%">
            <a class="btn btn-primary" href="{{ route('proyecto.oai', [$proyecto->id]) }}">
                Anterior
            </a>
        </td>
        <td width="50%" align="right">
            <a class="btn btn-primary" href="{{ route('solicitud.pre', [$proyecto->id])}}">
                SiguienteS
            </a>
        </td>
    </tr>
</table>

@endsection
