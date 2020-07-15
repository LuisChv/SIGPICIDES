@extends('errors::minimal')

@section('title', __('Acceso denegado'))
@section('code', '')
<style>
	#fakebg{
		width: 100%;
		height: 100%;
		background-color: #04043C;
	}
	#fondo{
		position:absolute; 
		z-index:1; 
		width:100%;
	}
</style>
<div id="fakebg">
	<img id="fondo" src="/black/img/403.png">
</div>
