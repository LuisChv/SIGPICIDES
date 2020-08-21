@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
	Consultar solicitudes 
@endsection
@section('content')
<div class="row">
	<div class="col-12">
            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-8 text-left">
                            <h2 class="card-title"><b>Solicitudes pendientes de aprobación</b></h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @foreach ($solicitudes as $soli)
                    <p>{{ $soli->nombre }}</p>
                    <hr>
                    @endforeach
                    <p>default 1</p>
                    <hr>
                    <p>default 2</p>
                    <hr>
                </div>
                <div class="card-footer"><br></div>
            </div>
        </div>
        <div class="container menuF-container">
            <input type="checkbox" id="toggleF">
            <label for="toggleF" class="buttonF"></label>
            <nav class="navF">
                <a href="#">Nueva solicitud</a>
                <a href="{{ route('cides') }}">Acerca de</a>
                <a href="#">Acciones largaaaaaaaaas</a>
            </nav>
        </div>
</div>
@endsection