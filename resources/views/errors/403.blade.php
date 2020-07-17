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

	

@endcan
