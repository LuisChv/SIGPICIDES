@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
    Administración de permisos
@endsection
@section('content')
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-9 text-left">
                        <h2 class="card-title"><b>Administración de Usuarios</b></h2>
                    </div>
                    <div class="col-sm-3 text-right">
                        <a role="button" class="btn btn-primary" href="{{ route('users.create')  }}">
                            <i class="tim-icons icon-simple-add"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container list-group">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th class="text-center" colspan = "3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $use) 
                                <tr>                     
                                    <td>{{$use->email}}</td>

                                    <td width='5%'>
                                        <a type="button" href="{{ route('permission.index', $use->id)}}" class="btn btn-default btn-sm btn-icon btn-round"><i class="tim-icons icon-key-25"></i></a>
                                    </td>
                                    <td width='5%'>
                                        <a type="button" href="{{ route('users.edit', $use->id)}}" class="btn btn-success btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-pencil"></i></a>
                                    </td>
                                    <form method="POST" id="formulario{{$use->id}}" action="{{route('users.destroy', $use->id)}}" >
                                    @csrf
                                    @method('DELETE')
                                    <td width='5%'>
                                        <button type="button" onClick="confirmar({{$use->id}})" class="btn btn-warning btn-sm btn-icon btn-round confirmar"><i class="tim-icons icon-simple-remove"></i></button> 
                                    </td></form>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-3">
        <div>
            <div class="card">
                <div class="card-header ">
                    <h4 class="card-title text-center"><b>Permisos del usuario</b></h4>
                </div>
                <div class="card-body"> 
                    <div id="accordion" role="tablist" aria-multiselectable="true" class="card-collapse">
                        @foreach ($tablas as $tb)
                            @foreach ($permisos_usuario as $permiso)
                                @if($permiso->id_tabla==$tb->id)
                                    <table class="table-sm"  width='100%'>
                                        <tr class="list-group-item py-1 list-group-flush" data-toggle="collapse" data-toggle="collapse" data-target="#listaA{{$tb->id}}" aria-expanded="false" aria-controls="listaA{{$tb->id}}">
                                            <td width='95%'>
                                                {{$tb->nombre}}
                                            </td>
                                            <td>
                                                <i class="tim-icons icon-minimal-down"></i>
                                            </td>
                                        </tr>
                                    </table>
                                    @break
                                @endif
                            @endforeach
                                <div id="listaA{{$tb->id}}" class="collapse" aria-labelledby="rec{{$tb->id}}" data-parent="#accordion">
                                    <table width='100%' class="table">
                                        @foreach ($permisos_usuario as $permiso)
                                            @if($permiso->id_tabla==$tb->id)  
                                                <tr id="{{$permiso->id}}" onMouseOver="ResaltarFila({{$permiso->id}});" onMouseOut="RestablecerFila({{$permiso->id}}, '')" onClick="eliminarPermiso({{ $permiso->id }});" >   
                                                    <td>
                                                    </td>                  
                                                    <td id="$permiso->id">
                                                        <form id="eliminarPermiso{{$permiso->id}}" method="post" action="{{route('permission.destroy')}}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input hidden name="id_permiso" value="{{$permiso->id}}">
                                                            <input hidden name="id_usuario" value="{{$user}}">
                                                            &nbsp;&nbsp;{{$permiso->name}}
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <i class="tim-icons icon-key-25"></i>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </table>
                                </div> 
                                                     
                        @endforeach
                        <br>
                        <!--fin de dropdown-->                  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-3">
        <div>
            <div class="card">
                <div class="card-header ">
                    <h4 class="card-title text-center"><b>Permisos disponibles</b></h4>
                </div>
                <div class="card-body">
                    <div id="accordion" role="tablist" aria-multiselectable="true" class="card-collapse">
                        @foreach ($tablas as $tb)
                            @foreach ($permisos as $permiso)
                                @if($permiso->id_tabla==$tb->id)
                                    <table class="table-sm"  width='100%'>
                                        <tr class="list-group-item py-1 list-group-flush" data-toggle="collapse" data-toggle="collapse" data-target="#listaB{{$tb->id}}" aria-expanded="false" aria-controls="listaB{{$tb->id}}">
                                            <td width = "95%">
                                                {{$tb->nombre}}
                                            </td>
                                            <td>
                                                <i class="tim-icons icon-minimal-down"></i>
                                            </td>
                                        </tr>
                                    </table>
                                    @break
                                @endif
                            @endforeach 
                                <div id="listaB{{$tb->id}}" class="collapse" aria-labelledby="rec{{$tb->id}}" data-parent="#accordion">
                                    <table width='100%' class="table">
                                        @foreach ($permisos as $permiso)
                                            @if($permiso->id_tabla==$tb->id)  
                                            <tr  id="{{$permiso->id}}" onMouseOver="ResaltarFila({{$permiso->id}});" onMouseOut="RestablecerFila({{$permiso->id}}, '')" onClick="añadirPermiso({{ $permiso->id }});" >
                                                <td>
                                                    <form id="añadirPermiso{{$permiso->id}}" method="post" action="{{route('permission.store')}}">
                                                        @csrf
                                                        <input hidden name="id_permiso" value="{{$permiso->id}}">
                                                        <input hidden name="id_usuario" value="{{$user}}">
                                                        &nbsp;&nbsp;{{$permiso->name}}
                                                    </form>
                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    </table>
                                </div>                    
                        @endforeach
                        <br>
                        <!--fin de dropdown-->                  
                    </div>
                </div>
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
    //añadir permiso al usuario
    function añadirPermiso(valor){
        //console.log(valor);
        document.getElementById("añadirPermiso"+valor).submit();
    }
    function eliminarPermiso(valor){
        document.getElementById("eliminarPermiso"+valor).submit();   
    }
</script>