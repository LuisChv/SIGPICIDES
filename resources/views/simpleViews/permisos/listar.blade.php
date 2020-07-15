@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
    Administración de permisos
@endsection
@section('content')
<div class="row">
    <div class="col-7">
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
                                <th>Nombre</th>
                                <th>Email</th>
                                <th class="text-right">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $use) 
                            <tr>                     
                                <td>{{$use->name}}</td>
                                
                                <td>{{$use->email}}</td>

                                <td width='10%' align="right">
                                    <a type="button" href="{{ route('permission.index', $use->id)}}" class="btn btn-default btn-sm btn-icon btn-round"><i class="tim-icons icon-key-25"></i></a>
                                </td>
                                <td width='10%' align="right">
                                    <a type="button" href="{{ route('users.edit', $use->id)}}" class="btn btn-success btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-pencil"></i></a>
                                </td>
                                <form method="POST" id="formulario{{$use->id}}" action="{{route('users.destroy', $use->id)}}" >
                                @csrf
                                @method('DELETE')
                                <td width='10%'>
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
    <div class="col-2">
        <div>
            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-9 text-left">
                            <h2 class="card-title"><b></b></h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h4>Permisos del usuario</h4>
                    <div id="accordion" role="tablist" aria-multiselectable="true" class="card-collapse">
                        @foreach ($tablas as $tb)
                            @foreach ($permisos_usuario as $permiso)
                                @if($permiso->id_tabla==$tb->id)
                                <table class="table-sm"  width='100%'>
                                    <tr class="list-group-flush" class="list-group-item list-group-flush" data-toggle="collapse" data-toggle="collapse" data-target="#listaB{{$tb->id}}" aria-expanded="false" aria-controls="listaB{{$tb->id}}" id="{{$tb->id}}">
                                        <td>
                                            {{$tb->nombre}}&nbsp;&nbsp;
                                        </td>
                                    </tr>
                                </table>
                                <div id="listaB{{$tb->id}}" class="collapse" aria-labelledby="rec{{$tb->id}}" data-parent="#accordion">
                                    <table width='100%' class="table">
                                        @foreach ($permisos_usuario as $permiso)
                                            @if($permiso->id_tabla==$tb->id)  
                                                <tr>                     
                                                    <td id="$permiso->id"><i class="tim-icons icon-planet"></i>
                                                        &nbsp;{{$permiso->name}}
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </table>
                                </div> 
                                @endif
                            @endforeach                     
                        @endforeach
                        <!--fin de dropdown-->                  
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-3">
        <div>
            <div class="card">
                <div class="card-body">
                    <h4>Permisos disponibles</h4>
                    <div id="accordion" role="tablist" aria-multiselectable="true" class="card-collapse">
                        @foreach ($tablas as $tb)
                            @foreach ($permisos as $permiso)
                                @if($permiso->id_tabla==$tb->id)
                                <table class="table-sm"  width='100%'>
                                    <tr class="list-group-flush" class="list-group-item list-group-flush" data-toggle="collapse" data-toggle="collapse" data-target="#listaB{{$tb->id}}" aria-expanded="false" aria-controls="listaB{{$tb->id}}" id="{{$tb->id}}">
                                        <td>
                                            {{$tb->nombre}}&nbsp;&nbsp;
                                        </td>
                                    </tr>
                                </table>
                                <div id="listaB{{$tb->id}}" class="collapse" aria-labelledby="rec{{$tb->id}}" data-parent="#accordion">
                                    <table width='100%' class="table">
                                        @foreach ($permisos as $permiso)
                                            @if($permiso->id_tabla==$tb->id)  
                                                <tr>                     
                                                    <td id="$permiso->id"><i class="tim-icons icon-planet"></i>
                                                        &nbsp;{{$permiso->name}}
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </table>
                                </div> 
                                @endif
                            @endforeach                     
                        @endforeach
                        <!--fin de dropdown-->                  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection