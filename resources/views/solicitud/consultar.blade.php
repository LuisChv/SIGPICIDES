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
                        <a href="#">Desarrollo de Sistema de Transacciones utilizando Minería de datos.</a>
                </div>
                <div class="card-body">
                        <a href="#">Traductor LESSA-Español empleando sensores y Machine Learning.</a>
                </div>
                <div class="card-body">
                        <a href="#">Sistema de validación de tarjetas magnéticas.</a>
                </div>
                <div class="card-body">
                        <a href="#">Encriptación de datos con BlockChain.</a>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
</div>
@endsection