@extends('simpleViews.recursos.listar')  
@section('title')
    Mostrar recursos
@endsection
@section('opcion')
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
	

@endsection
