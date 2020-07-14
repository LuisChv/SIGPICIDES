@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
	Consultar recurso
@endsection
@section('content')
<div class="row">
    <div class="col-7">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-8 text-left">
                        <h2 class="card-title"><b>Recursos disponibles</b></h2>
                    </div>
                    <div class="col-sm-4 text-right">
                        <a role="button" class="btn btn-primary" href="{{ route('recursos.create')  }}">
                            <i class="tim-icons icon-simple-add"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">                
                    <!--Dropdown para recurso-->
                <div id="accordion" role="tablist" aria-multiselectable="true" class="card-collapse">
                    <div class="list-group">
                        @foreach ($tiposrec as $tipo)
                        <div class="list-group-item list-group-flush">
                            <div role="tab" id="rec{{ $tipo->id }}">
                                <a data-toggle="collapse" data-toggle="collapse" data-target="#lista{{ $tipo->id }}" aria-expanded="false" aria-controls="lista{{ $tipo->id }}">
                                    {{ $tipo->nombre }}&nbsp;&nbsp;
                                    <i class="tim-icons icon-minimal-down"></i>
                                </a>
                            </div>
                            <div id="lista{{ $tipo->id }}" class="collapse" aria-labelledby="rec{{ $tipo->id }}" data-parent="#accordion">
                                <table width='100%' class="table">
                                    <br>
                                    @foreach($recursos as $rec)
                                    @foreach($recursos as $rec)
                                    @if($rec->id_tipo==$tipo->id)  
                                        <tr >                     
                                            <td id={{$rec->id}} onMouseOver="ResaltarFila({{$rec->id}});" onMouseOut="RestablecerFila({{$rec->id}}, '')" onClick="CrearEnlace('{{ route('recursos.show', $rec->id)}}');" >
                                                &nbsp;&nbsp;&nbsp;&nbsp;<i class="tim-icons icon-planet"></i>
                                                &nbsp;{{ $rec->nombre }}
                                            </td>
                                            <td width='10%' align="right">
                                                <a type="button" href="{{ route('recursos.edit', $rec->id)}}" class="btn btn-success btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-pencil"></i></a>&nbsp;&nbsp;
                                             <form method="POST" id="formulario" action="{{ route('recursos.destroy', $rec->id)}}">
                                            </td>
                                            @csrf
                                            @method('DELETE')
                                            <td width='10%'>
                                                <button type="button" onClick="confirmar()" class="btn btn-warning btn-sm btn-icon btn-round confirmar"><i class="tim-icons icon-simple-remove"></i></button> 
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
	<div class="col-5">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-8 text-left">
                        <h2 class="card-title"><b>Recurso: {{ $recurso->nombre }} </b></h2>
                    </div> 
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <body>
                        <tr>
                            <td class="font-weight-bold">Nombre</td>
                            <td>{{ $recurso->nombre }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Marca</td>
                            <td>{{ $recurso->id_marca }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Modelo</td>
                            <td>{{ $detalle->modelo }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Tipo</td>
                            <td>{{ $recurso->id_tipo }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Descripción</td>
                            <td>{{ $detalle->descripcion }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
<script langiage="javascript" type="text/javascript">
    // RESALTAR LAS FILAS AL PASAR EL MOUSE
    function ResaltarFila(id_fila) {
    document.getElementById(id_fila).style.backgroundColor = '#C9EFFE';
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
            document.getElementById("formulario").submit();
          } else {
            swal("Eliminación cancelada");
          }
        });
    }
</script>