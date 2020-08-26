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

                                    <td width='5%'>
                                        <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#create" onClick="agregarMiembro({{ $use->id }})"><i class="tim-icons icon-simple-add"></i></a>
                                    </td>
                                   
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
                                <select class="form-control selectorWapis" value="" id="rol" name="rol" disabled>
                                    <option value="" selected disabled hidden >--Seleccionar Rol--</option>
                                    @foreach ($roles as $rol)
                                        @if($miembro->id_rol==$rol->id)
                                            <option style="color: black !important;" selected>{{ $rol->name }}</option>
                                        @endif
                                        <option style="color: black !important;">{{ $rol->name }}</option>
                                    @endforeach
                                </select> 
                            </td>


                            <form method="POST" id="formulario{{$miembro->id_usuario}}" action="{{route('miembros.destroy', $miembro->id_usuario)}}" >
                                <td width='10%' align="right">
                                    <div class="btn-group" role="group">
                                        <a type="button" href="{{ route('miembros.edit', $miembro->id_usuario)}}" class="btn btn-success btn-sm btn-sm btn-icon btn-round">
                                            <i class="tim-icons icon-pencil"></i>
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onClick="confirmar({{$miembro->id_usuario}})" class="btn btn-warning btn-sm btn-icon btn-round confirmar">
                                            <i class="tim-icons icon-simple-remove"></i>
                                        </button> 
                                    </div>
                                </td>
                            </form>
                        
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                
               
                    <div class="modal fade" id="create">
                        <div class="modal-dialog modal-lg">
                            <form method="POST"  action="{{ route('miembros.store')}}">
                            @csrf
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <button type="button" class="close" data-dismiss="modal">
                                        <span>×</span>
                                        </button>
                                        <h4>Agregar Miembro</h4>
                                    </div>
                                    <div class="modal-body">
                                        <label for="rol">ROL DE EQUIPO</label>
                                        <select class="form-control selectorWapis" name="rolmiembro" id="rolmiembro">
                                            <option  selected disabled hidden >--Seleccionar Rol--</option>
                                            @foreach ($roles as $rol)
                                                <option style="color: black !important;">{{ $rol->name }}</option>
                                            @endforeach
                                        </select> 
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="investigador" id="investigador">
                                        <button type="submit" class="btn btn-primary" >Guardar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
               
            </div>
        </div>
    </div>
    <div class="container menuF-container">
                <input type="checkbox" id="toggleF">
                <label for="toggleF" class="buttonF"></label>
                <nav class="navF">
                    <a href="{{ route('solicitud.create')}}">Recursos</a>
                    <a href="{{ route('solicitud.create')}}">Factibilidad</a>
                    <a href="{{ route('miembros.index')}}">Miembros</a>
                    <a href="{{ route('solicitud.create')}}">Planificación</a>
                    <!--a href="{{ route('cides') }}">Acerca de</a>
                    <a href="#">Acciones largaaaaaaaaas</a-->
                </nav>
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