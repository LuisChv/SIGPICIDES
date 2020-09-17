@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
    Comite de Evalucion
@endsection
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-8 text-left">
                        <h2 class="card-title"><b> Comite de Evaluacion </b></h2>
                    </div> 
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Rol de Comite</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($miembros as $miembro) 
                        <tr>                     
                            <td> {{ $miembro->name }} </td>
                            <td> 
                                <select class="form-control selectorWapis" value="" id="rol" name="rol" disabled>
                                    <option value="">{{ $miembro->name1 }}</option>
                                </select> 
                            </td>


                            <form method="POST" id="formulario{{$miembro->id_usuario}}" action="{{ route('comite.destroy', [$miembro->id_usuario, $proyecto->id] )}}" >
                                <td width='10%' align="center">  
                                    @csrf
                                    @method('DELETE')
                                    <button @if ($miembro->role_id == 2 | $miembro->role_id == 3  ) disabled @endif type="button" onClick="confirmar({{$miembro->id_usuario}})" style="pointer-events: auto;" title="No se puede eliminar" class="btn btn-warning btn-sm btn-icon btn-round confirmar">
                                        <i class="tim-icons icon-simple-remove"></i>
                                    </button>         
                                </td>
                            </form>
                        
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                
            </div>
        </div>
    </div>

	<div class="col-md-6">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-9 text-left">
                        <h2 class="card-title"><b>Personal Experto Disponible</b></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 right">
                        <a role="button" class="btn btn-primary" href="{{ route('users.create') }}">
                            Registrar Nuevo Experto
                        </a>
                    </div>
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
                                @if ( $cantidad_miembros < 3 )
                                <td width='5%'>
                                    <button type="button" class="btn btn-success btn-sm btn-icon btn-round" data-toggle="modal" data-target="#create" onClick="agregarMiembro({{ $use->id }})"><i class="tim-icons icon-simple-add"></i></button>
                                </td>
                                @else 
                                <td width='5%'>
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
        

        <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="label" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form method="POST"  action="{{ route('comite.store', $proyecto->id )}}">
                @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="label">Nuevo Miembro</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="false">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <label for="rol">ROL DE COMITE</label>
                            <select class="form-control selectorWapis" name="rolmiembro" id="rolmiembro" disabled>
                                <option value=""> Experto </option>
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

        <div class="modal fade" id="nuevo" tabindex="-1" role="dialog" aria-labelledby="label" aria-hidden="true">
            <div class="modal-dialog" role="document">    
                <div class="modal-content">
                    <div class="modal-body">
                        <label aling = "center">Maximo de miembros es de 3</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
        
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