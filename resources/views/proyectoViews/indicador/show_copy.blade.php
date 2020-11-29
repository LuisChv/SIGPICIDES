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
			  	<div class="tab-pane fade show active" id="nav-general" role="tabpanel" aria-labelledby="nav-general-tab">
			  		<!--Descripcion general indicador-->
			  		<div class="row">
			  			<h2 class="col-md-10 card-title">[Nombre indicador ]</h2>
			  			<div class="col-md-2">
			  				<label class="container2">
			  					<input type="checkbox" checked disabled title="Completado">
			  					<span class="checkmark"></span>
			  				</label>
			  			</div>
			  		</div>
			  		<p class="font-weight-bold">Descripción</p><hr>
			  		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p><br>
			  		<p class="font-weight-bold">Tipo de indicador: Cualitativo</p><hr>
			  		<p class="font-weight-bold">Archivos disponibles:</p><hr>
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
			  		<br>
			  		<p class="font-weight-bold">Comentarios:</p>
			  		<hr>
			  		<p class="font-italic">Usuario1:</p>
			  		<textarea class="inputArea" disabled>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </textarea>
			  		<p class="font-italic">Usuario2:</p>
			  		<textarea class="inputArea" disabled>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </textarea>
			  		<p class="font-italic">Usuario3:</p>
			  		<textarea class="inputArea" disabled>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </textarea>
			  	</div>

			  	<div class="tab-pane fade" id="nav-stats" role="tabpanel" aria-labelledby="nav-stats-tab">
			  		<!--Las estadisticas son solo para los indicadores cuantitativos, hay que validar que no se genere este tab-->
			  		<h2 class="card-title">[Nombre indicador]</h2>
			  		<div class="indicador">
			  			<!--TODO Se debe decidir como ira la interfaz para el llenado de datos de la grafica-->
                        <div class="indicador__grafica">[Gráfica]</div>
                    </div>
			  	</div>
			  	<div class="tab-pane fade" id="nav-tareas" role="tabpanel" aria-labelledby="nav-tareas-tab">
			  		<!--Area que lista las tareas que se relacionan al indicador-->
			  		<table class="table">
			  			<tr>
			  				<th>Tarea</th>
			  				<th>Asignada</th>
			  				<th>Avance</th>
			  				<th>Estado</th>
			  			</tr>
			  			<tr>
			  				<td>task2</td>
			  				<td>Investigador1</td>
			  				<td>100%</td>
			  				<td>Finalizado</td>
			  			</tr>
			  			<tr>
			  				<td>task3</td>
			  				<td>Investigador2</td>
			  				<td>50%</td>
			  				<td>Aún sin completar</td>
			  			</tr>
			  			<tr>
			  				<td>task4</td>
			  				<td>Investigador3</td>
			  				<td>30%</td>
			  				<td>Aún sin completar</td>
			  			</tr>
			  			<tr>
			  				<td>task5</td>
			  				<td>Investigador1</td>
			  				<td>40%</td>
			  				<td>Aún sin completar</td>
			  			</tr>
			  		</table>
			  	</div>
			</div>	
	</div>
@endsection