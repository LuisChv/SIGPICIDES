@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
    Miembros de equipo
@endsection
@section('content')
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-8 text-left">
                        <h2 class="card-title"><b> Miembros de equipo </b></h2>
                    </div> 
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Rol de proyecto</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($miembros as $miembro) 
                        <tr>                     
                            <td> {{ $miembro->name }} </td>
                            <td> 
                                <select required class="form-control selectorWapis" value="" id="rol" name="rol" disabled>
                                    <option value="" selected disabled hidden >Seleccionar rol</option>
                                    @foreach ($roles as $rol)
                                        @if($miembro->id_rol == $rol->id)
                                            <option style="color: black !important;" selected>{{ $rol->name }}</option>
                                        @else
                                            <option style="color: black !important;">{{ $rol->name }}</option>
                                        @endif
                                    @endforeach
                                </select> 
                            </td>


                            <form method="POST" id="formulario{{$miembro->id_usuario}}" action="{{ route('miembros.destroy', [$miembro->id_usuario, $proyecto->id] )}}" >
                                <td width='10%' align="right">
                                    <div class="btn-group" role="group">
                                        @if ( $miembro->id_rol != 5  )
                                            <button type="button" data-toggle=modal data-target="#update" class="btn btn-success btn-sm btn-sm btn-icon btn-round" onclick="editarRolMiembro({{$miembro->id}},{{$miembro->id_rol}})">
                                                <i class="tim-icons icon-pencil"></i>
                                            </button>
                                            @csrf
                                            @method('DELETE')
                                            <button  type="button" onClick="confirmar({{$miembro->id_usuario}})" class="btn btn-warning btn-sm btn-icon btn-round confirmar">
                                                <i class="tim-icons icon-simple-remove"></i>
                                            </button> 
                                        @endif
                                    </div>
                                </td>
                            </form>
                        
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

	<div class="col-6">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-9 text-left">
                        <h2 class="card-title"><b>Investigadores del sistema</b></h2>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container list-group">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th class="text-center" colspan = "3">Agregar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $use) 
                                <tr>                     
                                    <td> {{ $use->name }} </td>
                                    @if ( $cantidad_miembros < $equipo->miembros )
                                    <td width='5%' class="text-center">
                                        <button type="button" class="btn btn-success btn-sm btn-icon btn-round" data-toggle="modal" data-target="#create" onClick="agregarMiembro({{ $use->id }})"><i class="tim-icons icon-simple-add"></i></button>
                                    </td>
                                    @else 
                                    <td width='5%' class="text-center">
                                        <button type="button" class="btn btn-success btn-sm btn-icon btn-round" data-toggle="modal" data-target="#nuevo"><i class="tim-icons icon-simple-add"></i></button>
                                    </td>
                                    @endif
                                   
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form method="POST"  action="{{ route('miembros.store', $proyecto->id )}}">
                @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="label">Nuevo Miembro</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="false">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label for="rol">ROL DE EQUIPO</label>
                            <select required class="form-control selectorWapis" name="rolmiembro" id="rolmiembro">
                                <option value=""  selected disabled hidden >Seleccionar rol</option>
                                @foreach ($roles as $rol)
                                    @if ($rol->id == 5)
                                        <option style="display:none;"></option>
                                    @else
                                        <option style="color: black !important;">{{ $rol->name }}</option>
                                    @endif
                                @endforeach
                            </select> 
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="investigador" id="investigador">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Añadir</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--modal de edicion-->
        <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form method="POST"  action="{{ route('miembros.update', $proyecto->id )}}">
                @csrf
                @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="label">Editar rol de miembro</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="false">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label for="rol">ROL DE EQUIPO</label>
                            <select class="form-control selectorWapis" name="rolmiembro" id="rolmiembroEditar">
                                <option selected disabled hidden >Seleccionar rol</option>
                                @foreach ($roles as $rol)
                                    @if ($rol->id != 5)
                                        <option val="{{$rol->id}}" style="color: black !important;">{{ $rol->name }}</option>
                                    @endif
                                @endforeach
                            </select> 
                            <input hidden id="id_proy" val={{$proyecto->id}}>
                            <input hidden id="id_miembro">
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="investigador" id="investigador">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="modal fade" id="nuevo" tabindex="-1" role="dialog" aria-labelledby="label" aria-hidden="true">
            <div class="modal-dialog" role="document">    
                <div class="modal-content">
                    <div class="modal-body">
                        <label aling = "center">Maximo de miembros es de {{ $equipo->miembros }}</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="col-md-12">
        <table width="100%">
            <tr>
                <td width="50%">
                    <a class="btn btn-primary" href="{{ route('factibilidad.edit', [$proyecto->id]) }}">
                        Anterior
                    </a>
                </td>
                <td width="50%" align="right">
                    <a class="btn btn-primary" href="{{ route('proyecto_tareas.index', [$proyecto->id]) }}">
                        Siguiente
                    </a>
                </td>
            </tr>
        </table>
    </div>
    
</div>
@endsection

<script src="sweetalert2.all.min.js"></script>
<script langiage="javascript" type="text/javascript">
   
    
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

    function agregarMiembro(id){
        $('#investigador').val(id);
    }
    
</script>