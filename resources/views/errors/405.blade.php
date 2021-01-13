@extends('errors::minimal')

@section('title', __('No encontrado'))
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
<div id="fakebg">
	<img id="fondo" src="/black/img/404.png">
</div>
