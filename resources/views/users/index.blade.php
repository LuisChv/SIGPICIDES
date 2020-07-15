@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
    Usuarios
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
                                            <button type="button" class="btn btn-default btn-sm btn-icon btn-round"><i class="tim-icons icon-key-25"></i></button>
                                            <a type="button" href="{{ route('users.edit', $use->id)}}" class="btn btn-success btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-pencil"></i></a>
                                        </td>
                                        <form method="POST" id="" action="#" >
                                        @csrf
                                        @method('DELETE')
                                            <td width='10%'>
                                                <button type="button" onClick="" class="btn btn-warning btn-sm btn-icon btn-round confirmar"><i class="tim-icons icon-simple-remove"></i></button> 
                                            </td></form>
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
</div>
@endsection