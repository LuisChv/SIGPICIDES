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
                        <h2 class="card-title"><b>Miembros de equipo</b></h2>
                    </div>
                    <div class="col-sm-3 text-right">
                        <a role="button" class="btn btn-primary" href="#">
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
                                    <th class="text-center" colspan = "3">Agregar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $use) 
                                <tr>                     
                                    <td> {{ $use->user_id }} </td>

                                    <td width='5%'>
                                        <a role="button" class="btn btn-primary" href="{{ route('miembros.store')  }}"><i class="tim-icons icon-simple-add"></i></a>
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
                        <h2 class="card-title"><b> Miembros </b></h2>
                    </div> 
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th class="text-center" colspan = "3">Rol</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $miembro) 
                        <tr>                     
                            <td> {{ $miembro->user_id }} </td>
                            <td> {{ $miembro->user_id}} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

