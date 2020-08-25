@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
	Asignar recursos
@endsection
@section('content')
<div class="row">
	<div class="col-5">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-8 text-left">
                        <h3 class="card-title"><b>Recursos disponibles</b></h3>
                    </div>                   
                </div>
            </div>
            <div class="card-body">                
                    <!--Dropdown para recurso-->
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
                                        @foreach($recursos as $rec)
                                            @if($rec->id_tipo==$tipo->id)  
                                                <tr>                     
                                                    <td id={{$rec->id}} onMouseOver="ResaltarFila({{$rec->id}});" onMouseOut="RestablecerFila({{$rec->id}}, '')" onClick="CrearEnlace('{{ route('recursos.show', $rec->id)}}');" >
                                                        &nbsp;&nbsp;&nbsp;&nbsp;<i class="tim-icons icon-planet"></i>
                                                        &nbsp;{{ $rec->nombre }}
                                                    </td>                                                   
                                                    <form method="POST" id="formulario{{$rec->id}}" action="{{route('recursos.destroy', $rec->id)}}" >
                                                    @csrf                                                    
                                                    <td width='10%'>
                                                        <button type="button" class="btn btn-success btn-sm btn-icon btn-round"><i class="tim-icons icon-simple-add"></i></button> 
                                                    </td></form>
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
            <div class="card-footer"><br></div>
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

    
</script>