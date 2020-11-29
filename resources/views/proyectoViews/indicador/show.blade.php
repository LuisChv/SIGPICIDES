@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
    Indicador
@endsection
@section('content')
	<div class="row">
		<div class="col-12">
			<nav>
				<div class="nav nav-tabs" id="nav-tab" role="tablist">
				    <a style="color:primary; !important font-style: bold; !important"class="nav-item nav-link active" id="nav-general-tab" data-toggle="tab" href="#nav-general" role="tab" aria-controls="nav-general" aria-selected="true">General</a>
				    <a style="color:primary; !important font-style: bold; !important"class="nav-item nav-link" id="nav-stats-tab" data-toggle="tab" href="#nav-stats" role="tab" aria-controls="nav-stats" aria-selected="false">Estadísticas</a>
				    <a style="color:primary; !important font-style: bold; !important"class="nav-item nav-link" id="nav-tareas-tab" data-toggle="tab" href="#nav-tareas" role="tab" aria-controls="nav-tareas" aria-selected="false">Tareas</a>
				</div>
			</nav>
			<br>
			<div class="tab-content" id="nav-tabContent">

			  	@yield('seccion')

			</div>
		</div>	
	</div>
@endsection