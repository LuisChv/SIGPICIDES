@extends('users.index')  
@section('title')
    Editar usuario
@endsection
@section('opcion')
	<div class="col-6">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-8 text-left">
                        <h2 class="card-title"><b>{{ $user->name }} </b></h2>
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