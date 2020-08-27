@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
    Nueva investigación
@endsection
@section('content')
<div class="row">
    <div class="col-12">
            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-12 text-left">
                            <h2 class="card-title"><b>Objetivos & alcances</b></h2>
                        </div>
                    </div>
                </div>
                <form class="form" method="POST" action="">
                    @csrf                                    
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>
                                    <textarea class="form-control border" rows="3" placeholder="Escriba un objetivo de su proyecto"></textarea>
                                </td>
                                <td>
                                    <button class="btn btn-success btn-sm btn-icon btn-round"> <i class="tim-icons icon-simple-add"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <textarea class="form-control border" rows="3" placeholder="Escriba un alcance de su proyecto"></textarea>
                                </td>
                                <td>
                                    <button class="btn btn-success btn-sm btn-icon btn-round"> <i class="tim-icons icon-simple-add"></i></button>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary" href="{{route('factibilidad.create')}}">Siguiente &nbsp;&nbsp;&nbsp;<i class="tim-icons icon-double-right font-weight-bold"></i></a> <br><br>              
                    </div>                    
                </form>
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
