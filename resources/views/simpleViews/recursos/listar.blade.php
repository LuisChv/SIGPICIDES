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
                            <h2 class="card-title"><b>Recursos disponibles</b></h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="input-group col-sm-7">
                        <i class="tim-icons icon-planet"></i>
                        <a href="#">Categoría recurso 1</a>
                    </div>
                </div>
                <div class="card-body">
                    <i class="tim-icons icon-planet"></i>
                        <a href="#">Categoría recurso 2</a>
                </div>
                <div class="card-body">
                        <a href="#">Categoría recurso 2</a>
                </div>
                <div class="card-body">
                        <a href="#">Categoría recurso 2</a>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
</div>
@endsection