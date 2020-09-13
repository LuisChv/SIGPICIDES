@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
	Consultar solicitudes 
@endsection
@section('content')
<div class="row">
    <div class="col-4">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-9 text-left">
                        <h2 class="card-title"><b>Objetivos</b></h2>
                    </div>
                    <div class="col-sm-3 text-left">
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalObjetivo">+</button>
                        <form method="POST" action="{{route('proyecto_objetivos.store')}}">
                            @csrf
                            <div class="modal fade" id="modalObjetivo" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Nuevo objetivo</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="false">&times;</span>
                                                </button>
                                        </div>
                                        <div class="modal-body" >                     
                                            <table class="table" style="background-color: white !important;" >
                                                <tr>
                                                    <td width="40%" class="font-weight-bold" style="color: #222a42 !important;">Descripción del objetivo:</td>
                                                    <td width="60%"><textarea rows="3" style="color: #222a42 !important;" class="form-control border border-light rounded" name="descripcion_objetivo"></textarea></td>
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
                    <tr>
                        <td class="align-text-top"><i class="tim-icons icon-compass-05"></i></td>
                        <td>
                            Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. 
                        </td>
                        <td>
                            <button class="btn btn-warning btn-round btn-icon" onclick="confirmar()"><i class="tim-icons icon-simple-remove"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-text-top"><i class="tim-icons icon-compass-05"></i></td>
                        <td>
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat 
                        </td>
                        <td>
                            <button class="btn btn-warning btn-round btn-icon" onclick="confirmar()"><i class="tim-icons icon-simple-remove"></i></button>
                        </td>
                    </tr>
                    @foreach ($objetivos as $objetivo)
                        <tr>
                            <td class="align-text-top"><i class="tim-icons icon-compass-05"></i></td>
                            <td>
                                {{$objetivo->descripcion}}
                            </td>
                            <form method="POST" action="#">
                                @csrf
                                <td>
                                    <button class="btn btn-warning btn-round btn-icon" onclick="confirmar({{$objetivo->id}})">
                                        <i class="tim-icons icon-simple-remove"></i></button>
                                </td>
                            </form>
                            
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <div class="col-4">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-9 text-left">
                        <h2 class="card-title"><b>Alcances</b></h2>
                    </div>
                    <div class="col-sm-3 text-left">
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAlcance">+</button>
                        <form method="POST" action="{{route('proyecto_alcances.store')}}">
                            @csrf
                            <div class="modal fade" id="modalAlcance" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
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
                                                    <td width="40%" class="font-weight-bold" style="color: #222a42 !important;">Descripción del alcance:</td>
                                                    <td width="60%"><textarea rows="3" style="color: #222a42 !important;" class="form-control border border-light rounded" name="descripcion_alcance"></textarea></td>
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
                    <tr>
                        <td class="align-text-top"><i class="tim-icons icon-wifi"></i></td>
                        <td>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. 
                        </td>
                        <td>
                            <button class="btn btn-warning btn-round btn-icon" onclick="confirmar()"><i class="tim-icons icon-simple-remove"></i></button>
                        </td>
                    </tr>
                    @foreach ($alcances as $alcance)
                        <tr>
                            <td class="align-text-top"><i class="tim-icons icon-wifi"></i></td>
                            <td>
                                {{$alcance->descripcion}}
                            </td>
                            <form method="POST" action="#">
                                @csrf
                                <td>
                                    <button class="btn btn-warning btn-round btn-icon" onclick="confirmar({{$alcance->id}})">
                                        <i class="tim-icons icon-simple-remove"></i></button>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <div class="col-4">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-9 text-left">
                        <h2 class="card-title"><b>Indicadores</b></h2>
                    </div>
                    <div class="col-sm-3 text-left">
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalIndicador">+</button>
                        <form method="POST" action="{{route('proyecto_indicadores.store')}}">
                            @csrf
                            <div class="modal fade" id="modalIndicador" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
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
                                                    <td width="40%" class="font-weight-bold" style="color: #222a42 !important;">Tipo:</td>
                                                    <td width="60%">
                                                        <select style="color: #222a42 !important;" class="form-control border border-light rounded" name="indicador_tipo">
                                                            <option value="true">Seleccionar tipo de indicador</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="40%" class="font-weight-bold" style="color: #222a42 !important;">Meta:</td>
                                                    <td width="60%"><input type="number" style="color: #222a42 !important;" class="form-control border border-light rounded" name="indicador_meta"></td>
                                                </tr>
                                                <tr>
                                                    <td width="40%" class="font-weight-bold" style="color: #222a42 !important;">Cantidad de variables:</td>
                                                    <td width="60%"><input type="number" style="color: #222a42 !important;" class="form-control border border-light rounded" name="indicador_cant"></td>
                                                </tr>
                                                <tr>
                                                    <td width="40%" class="font-weight-bold" style="color: #222a42 !important;">Descripcion avance (?):</td>
                                                    <td width="60%"><input type="number" style="color: #222a42 !important;" class="form-control border border-light rounded" name="indicador_avance"></td>
                                                </tr>                                                
                                                <tr>
                                                    <td width="40%" class="font-weight-bold" style="color: #222a42 !important;">Descripción del indicador:</td>
                                                    <td width="60%"><textarea rows="3" style="color: #222a42 !important;" class="form-control border border-light rounded" name="descripcion_indicador"></textarea></td>
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
                    <tr>
                        <td class="align-text-top"><i class="tim-icons icon-sound-wave"></i></td>
                        <td>
                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.  
                        </td>
                        <td>
                            <button class="btn btn-warning btn-round btn-icon" onclick="confirmar()"><i class="tim-icons icon-simple-remove"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-text-top"><i class="tim-icons icon-sound-wave"></i></td>
                        <td>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                        </td>
                        <td>
                            <button class="btn btn-warning btn-round btn-icon" onclick="confirmar()"><i class="tim-icons icon-simple-remove"></i></button>
                        </td>
                    </tr>
                    @foreach ($indicadores as $indicador)
                        <tr>
                            <td class="align-text-top"><i class="tim-icons icon-sound-wave"></i></td>
                            <td>
                                {{$indicador->detalle}}
                            </td>
                            <form method="POST" action="#">
                                @csrf
                                <td>
                                    <button class="btn btn-warning btn-round btn-icon" onclick="confirmar({{$indicador->id}})">
                                        <i class="tim-icons icon-simple-remove"></i></button>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
<script language="javascript" type="text/javascript">
    require("sweetalert");
    function confirmar(valor){
        //ruta.concat(variable,")}}");
        swal({
          title: "¿Eliminar registro?",
          text: "Esta acción es irreversible.",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            swal("Registro eliminado", {
              icon: "success",
            });
            document.getElementById("formulario"+valor).submit();
          } else {
            swal("Eliminación cancelada");
          }
        });
    }
    function confirmar(){
        swal({
          title: "¿Eliminar registro?",
          text: "Esta acción es irreversible.",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            swal("Registro eliminado", {
              icon: "success",
            });
          } else {
            swal("Eliminación cancelada");
          }
        });
    }

    
</script>
@endsection
