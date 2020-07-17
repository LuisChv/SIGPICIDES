@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
    Crear Usuario
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
                                    <td id={{$use->id}} onMouseOver="ResaltarFila({{$use->id}});" onMouseOut="RestablecerFila({{$use->id}}, '')" onClick="CrearEnlace('{{ route('users.show', $use->id)}}');">{{$use->email}}</td>

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
	<div class="col-6">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-8 text-left">
                        <h2 class="card-title"><b>Usuario: {{ $user->name }} </b></h2>
                    </div> 
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <body>
                        <tr>
                            <td class="font-weight-bold">Nombre</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Email</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Institucion</td>
                            <td>{{ $user->institucion }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Descripcion</td>
                            <td>{{ $user->descripcion }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Fecha Nac.</td>
                            <td>{{ $user->fecha_nac }}</td>
                        </tr>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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