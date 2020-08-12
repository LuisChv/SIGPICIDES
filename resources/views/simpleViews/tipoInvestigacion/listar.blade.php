@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
	Cat&aacute;logo de tipos de investigaci&oacute;n 
@endsection
@section('content')
<div class="row">
	<div class="col-md-7">
            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-12 text-left">
                            <h2 class="card-title"><b>Catálogo de tipos de investigaci&oacute;n</b></h2>
                        </div>
                        <div class="col-sm-12 text-right">
                                <a role="button" class="btn btn-primary col-sm-4" href="{{ route('tipo_investigacion.create')  }}">
                                    <i class="tim-icons icon-simple-add"></i>&nbsp;&nbsp;Tipo
                                </a>
                                <a role="button" class="btn btn-primary col-sm-4" href="{{ route('subtipo_investigacion.create')  }}">
                                    <i class="tim-icons icon-simple-add"></i>&nbsp;&nbsp;Subtipo
                                </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <br/>                    
                    <!--Dropdown para recurso-->
                    <div id="accordion" role="tablist" aria-multiselectable="true" class="card-collapse">
                        <div class="list-group">
                            @foreach ($tipos as $tipo)
                                <div>
                                    <table class="table-sm" width='100%'>
                                            <tr class="list-group-item py-1 list-group-flush"  aria-controls="lista{{ $tipo->id }}" id={{$tipo->id}} onMouseOver="ResaltarFila({{$tipo->id}});" onMouseOut="RestablecerFila({{$tipo->id}}, '')">
                                                <td width='90%' data-toggle="collapse" data-target="#lista{{ $tipo->id }}" aria-expanded="false">
                                                    {{ $tipo->nombre }}&nbsp;&nbsp;
                                                    <i class="tim-icons icon-minimal-down"></i>
                                                </td>
                                                <form method="POST" id="formularioTipo{{$tipo->id}}" action="{{ route('tipo_investigacion.destroy', $tipo->id)}}">
                                                    <td width='10%' align="right">
                                                        <div class="btn-group" role="group">
                                                            <a type="button" href="{{ route('tipo_investigacion.edit', $tipo->id)}}" class="btn btn-success btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-pencil"></i></a>                        
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" onClick="confirmarTipo({{$tipo->id}})" class="btn btn-warning btn-sm btn-icon btn-round confirmar"><i class="tim-icons icon-simple-remove"></i></button>
                                                        </div>
                                                    </td>
                                                </form>
                                            </tr>
                                    </table>
                                    <div id="lista{{ $tipo->id }}" class="collapse" aria-labelledby="rec{{ $tipo->id }}" data-parent="#accordion">
                                        <table width='100%' class="table-sm">
                                            @foreach($sub_tipos as $sub_tipo)
                                                @if($sub_tipo->id_tipo==$tipo->id)  
                                                    <tr class="list-group-item py-1 list-group-flush">  
                                                        <td width='5%'>
                                                        </td>                   
                                                        <td width='85%'>
                                                            <i class="tim-icons icon-planet"></i>
                                                            &nbsp;{{ $sub_tipo->nombre }}
                                                        </td>
                                                        <form method="POST" id="formulario{{$sub_tipo->id}}" action="{{ route('subtipo_investigacion.destroy', $sub_tipo->id)}}">
                                                            <td width='10%' align="right">
                                                                <div class="btn-group" role="group">
                                                                    <a type="button" href="{{ route('subtipo_investigacion.edit', $sub_tipo->id)}}" class="btn btn-success btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-pencil"></i></a>
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button" onClick="confirmar({{$sub_tipo->id}})" class="btn btn-warning btn-sm btn-icon btn-round confirmar"><i class="tim-icons icon-simple-remove"></i></button> 
                                                                </div>
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
                        <br>
                        </div>                   
                    </div>                    
                </div>
                <div class="card-footer"></div>
        </div>
    </div>
    @yield('opcion')
</div>
@endsection
<script src="sweetalert2.all.min.js"></script>
<script langiage="javascript" type="text/javascript">
    // RESALTAR LAS FILAS AL PASAR EL MOUSE
    function ResaltarFila(id_fila) {
    document.getElementById(id_fila).style.backgroundColor = '#9c9c9c';
    }
    // RESTABLECER EL FONDO DE LAS FILAS AL QUITAR EL FOCO
    function RestablecerFila(id_fila, color) {
    document.getElementById(id_fila).style.backgroundColor = color;
    }
    // CONVERTIR LAS FILAS EN LINKS
    function CrearEnlace(url) {
    location.href=url;
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
    function confirmarTipo(valor){
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
            document.getElementById("formularioTipo"+valor).submit();
          } else {
            swal("Eliminación cancelada");
          }
        });
    }
</script>