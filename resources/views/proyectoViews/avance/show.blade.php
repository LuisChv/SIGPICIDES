@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
    Indicadores
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-md-8">
                        <h2 class="card-title">Avance: [Nombre de avance]</h2>
                    </div>
                    <div class="col-md-4">
                        <h3>Fecha: [DD/MM/YYYY]</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <p class="font-weight-bold">Archivos disponibles</p>
                <hr>
                <div class="row">
                    <div class="col-md-3">archivo.jpg</div>
                    <div class="col-md-3">archivo.jpg</div>
                    <div class="col-md-3">archivo.jpg</div>
                    <div class="col-md-3">archivo.jpg</div>
                    <div class="col-md-3">archivo.jpg</div>
                    <div class="col-md-3">archivo.jpg</div>
                    <div class="col-md-3">archivo.jpg</div>
                    <div class="col-md-3">archivo.jpg</div>
                    <div class="col-md-3">archivo.jpg</div>
                    <div class="col-md-3">archivo.jpg</div>
                </div>
                <p clas="font-weight-bold">Comentarios</p>
                <hr>
                <textarea class="inputArea" disabled>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </textarea>
                <textarea class="inputArea" disabled>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </textarea>
            </div>                            
        </div>
    </div>
</div>
@endsection
