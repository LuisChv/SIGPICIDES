@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
	Consultar solicitudes 
@endsection
@section('content')
<div class="row">
    <div class="col-4">
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
                                <div class="modal-dialog" role="document">
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
                                                    <td width="40%" class="font-weight-bold" style="color: #222a42 !important;">Descripción del objetivo:</td>
                                                    <td width="60%"><textarea required rows="3" style="color: #222a42 !important;" class="form-control border border-light rounded" name="descripcion_objetivo"></textarea></td>
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
                                    <button type="button" class="btn btn-sm btn-warning btn-round btn-icon" onclick="confirmar('_objetivo{{$objetivo->id}}')">
                                        <i class="tim-icons icon-simple-remove"></i>
                                    </button>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <div class="col-4">
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
                                    <button type="button" class="btn btn-warning btn-sm btn-round btn-icon" onclick="confirmar('_alcance{{$alcance->id}}')">
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
                                    <button type="button" class="btn btn-warning btn-sm btn-round btn-icon" onclick="confirmar('_indicador{{$indicador->id}}')">
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
<div class="row">
    <div class="col-md-6 text-left">
        <a class="btn btn-primary" href="">
            General
        </a>
    </div>
    <div class="col-md-6 text-right">
        <a class="btn btn-primary" href="{{ route('proyecto_recursos.create', [$id])}}">
            Recursos
        </a>
    </div>
</div>
<script language="javascript" type="text/javascript">
    var cartitas1=document.querySelector('#objetivosCard');
    var cartitas2=document.querySelector('#alcancesCard');        
    var cartitas3=document.querySelector('#indicadoresCard');
    var ancho1=cartitas1.offsetHeight;
    var ancho2=cartitas2.offsetHeight;       
    var ancho3=cartitas3.offsetHeight;
    console.log(ancho1);       

    if(ancho1>=ancho2){
        console.log('1 mayor');
        if(ancho1>=ancho3){
            console.log('TRUE2');
            document.getElementById("alcancesCard").setAttribute("style","height:"+ancho1+"px"); 
            document.getElementById("indicadoresCard").setAttribute("style","height:"+ancho1+"px");
        }
    } else if(ancho2>=ancho1){
        console.log('2 mayor');
        if(ancho2>=ancho3){
            console.log('TRUE2');
            document.getElementById("objetivosCard").setAttribute("style","height:"+ancho2+"px"); 
            document.getElementById("indicadoresCard").setAttribute("style","height:"+ancho2+"px");
        }
    } else if(ancho3>=ancho1){
        console.log('3 mayor');
        if(ancho3>=ancho2){
            console.log('TRUE2');
            document.getElementById("objetivosCard").setAttribute("style","height:"+ancho3+"px"); 
            document.getElementById("alcancesCard").setAttribute("style","height:"+ancho3+"px");
        }
    }


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
</script>
@endsection
