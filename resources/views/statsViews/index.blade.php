@extends('layouts.app',['pageSlug' => 'informes.general'])
@section('title')
    Estadísticas del sistema
@endsection
@section('content')
	<div class="row">
		<div class="col-12">
			<nav>
				<div class="nav nav-tabs" id="nav-tab" role="tablist">
					<a style="color:primary; !important font-style: bold; !important"class="nav-item nav-link" id="nav-investigaciones-tab" data-toggle="tab" 
					href="#nav-investigaciones" role="tab" aria-controls="nav-investigaciones" aria-selected="true" onclick="buildChart({{json_encode($tipo_investigacion)}},'tipo_inv' , 'nombre', 'count')">Investigaciones</a>
					<a style="color:primary; !important font-style: bold; !important"class="nav-item nav-link" id="nav-estados-tab" data-toggle="tab" 
					href="#nav-estados" role="tab" aria-controls="nav-estados" aria-selected="false" onclick="buildChart({{json_encode($subtipo_investigacion)}}, 'subtipo_inv' , 'nombre', 'count')">Subtipo de investigación</a>
					<a style="color:primary; !important font-style: bold; !important"class="nav-item nav-link" id="nav-recursos-tab" data-toggle="tab" 
					href="#nav-recursos" role="tab" aria-controls="nav-recursos" aria-selected="false" onclick="buildChart({{json_encode($recursos)}},'recursos', 'nombre', 'sum')">Recursos</a>
					<a style="color:primary; !important font-style: bold; !important"class="nav-item nav-link" id="nav-tiempos-tab" data-toggle="tab" 
					href="#nav-tiempos" role="tab" aria-controls="nav-tiempos" aria-selected="false" onclick="buildChart({{json_encode($marcas)}}, 'marcas', 'nombre', 'sum')">Marcas</a>
				</div>
			</nav>
			<br>
			<div class="tab-content" id="nav-tabContent">
			  	<div class="tab-pane fade show active" id="nav-investigaciones" role="tabpanel" aria-labelledby="nav-investigaciones-tab">
			  		<!--Preferencias de los tipos o subtipos de investigaciones-->
			  		<div class="card">
						<div class="card-header"> 
							<h2 class="card-title">Preferencias de tipo de investigación</h2>
						</div>
						<div class="card-body">
							<div class="indicador">
								<!--TODO Grafica de uso de recursos-->
								<div class="indicador__grafica">
									<canvas id="tipo_inv"></canvas>								
								</div>
							</div> 
						</div> 
					</div>			  		
			  	</div>

			  	<div class="tab-pane fade" id="nav-estados" role="tabpanel" aria-labelledby="nav-estados-tab">
			  		<!--Estados de los proyectos del sistema-->
			  		<div class="card">
						<div class="card-header"> 
							<h2 class="card-title">Preferencias de subtipo de investigación</h2>
						</div>
						<div class="card-body">
							<div class="indicador">
								<!--TODO Grafica de uso de recursos-->
								<div class="indicador__grafica">
									<canvas id="subtipo_inv"></canvas>								
								</div>
							</div> 
							<p>Detalle de los nombre de subtipos de investigación en el orden de aparición (de izquierda a derecha)</p>
							<ul>
							@foreach($subtipo_investigacion as $subtipo)
								@if($subtipo->count>0)
								<li>{{$subtipo->nombre}}</li>
								@endif
							@endforeach
							<ul>
						</div> 
					</div>
			  	</div>
			  	<div class="tab-pane fade" id="nav-recursos" role="tabpanel" aria-labelledby="nav-recursos-tab">
                    <!--Estadísticas del uso de recursos-->
			  		<div class="card">
						<div class="card-header"> 
							<h2 class="card-title">Uso de recursos</h2>
						</div>
						<div class="card-body">
							<div class="indicador">
								<!--TODO Grafica de uso de recursos-->
								<div class="indicador__grafica">
									<canvas id="recursos"></canvas>								
								</div>
							</div> 
						</div> 
					</div>
                  </div>
                  <div class="tab-pane fade" id="nav-tiempos" role="tabpanel" aria-labelledby="nav-tiempos-tab">
                    <!--Estadps de los proyectos del sistema-->
					<div class="card">
						<div class="card-header"> 
							<h2 class="card-title">Marcas</h2>
						</div>
						<div class="card-body">
							<div class="indicador">
								<!--TODO Grafica de uso de recursos-->
								<div class="indicador__grafica">
									<canvas id="marcas"></canvas>								
								</div>
							</div> 
						</div> 
					</div>
			  	</div>
			</div>	
		</div>
	</div>
	<script>
		$( document ).ready(function() {
			let arreglo =  {!! json_encode($tipo_investigacion) !!};
			buildChart(arreglo,'tipo_inv' , 'nombre', 'count')
		});
	</script>
@endsection