@extends('errors::minimal')

@section('title', __('Acceso denegado'))
@section('code', '')
<style>
	#fakebg{
		width: 100% !important;
		height: 100% !important;
		background-color: #04043C;
	}
	::-webkit-scrollbar {
	    display: none;
	}
	#fondo{
		position:absolute !important; 
		z-index:1 !important; 
		width:100% !important;
	}
</style>

@can('validacion')
	<div id="fakebg">		
		<img id="fondo" src="/black/img/403.png">
	</div>
@else
	<div>
		<p>Se ha enviado un mensaje a su correo electrónico para confirmar su cuenta.</p>
	</div>
	<br>
	<div>
		<p>Si no recibio el correo presione el boton para reenviarlo.</p>
	</div>
	<div>
			<a href="{{url('resend/verify')}}"><button type="button">Enviar correo</button></a>
	</div>

@endcan
