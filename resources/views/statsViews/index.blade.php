@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
    Estadísticas del sistema
@endsection
@section('content')
	<div class="row">
		<div class="col-12">
			<nav>
				<div class="nav nav-tabs" id="nav-tab" role="tablist">
				    <a style="color:primary; !important font-style: bold; !important"class="nav-item nav-link active" id="nav-investigaciones-tab" data-toggle="tab" href="#nav-investigaciones" role="tab" aria-controls="nav-investigaciones" aria-selected="true">Investigaciones</a>
				    <a style="color:primary; !important font-style: bold; !important"class="nav-item nav-link" id="nav-estados-tab" data-toggle="tab" href="#nav-estados" role="tab" aria-controls="nav-estados" aria-selected="false">Estados de proyectos</a>
                    <a style="color:primary; !important font-style: bold; !important"class="nav-item nav-link" id="nav-recursos-tab" data-toggle="tab" href="#nav-recursos" role="tab" aria-controls="nav-recursos" aria-selected="false">Recursos</a>
                    <a style="color:primary; !important font-style: bold; !important"class="nav-item nav-link" id="nav-tiempos-tab" data-toggle="tab" href="#nav-tiempos" role="tab" aria-controls="nav-tiempos" aria-selected="false">Estimaciones de tiempo</a>
				</div>
			</nav>
			<br>
			<div class="tab-content" id="nav-tabContent">
			  	<div class="tab-pane fade show active" id="nav-investigaciones" role="tabpanel" aria-labelledby="nav-investigaciones-tab">
			  		<!--Preferencias de los tipos o subtipos de investigaciones-->
			  		<h2 class="col card-title">Preferencias de las investigaciones</h2>
                    <div class="indicador">
			  			<!--TODO Grafica preferencias de investigacion-->
                        <div class="indicador__grafica">[Gráfica]</div>
                    </div>			  		
			  	</div>

			  	<div class="tab-pane fade" id="nav-estados" role="tabpanel" aria-labelledby="nav-estados-tab">
			  		<!--Estados de los proyectos del sistema-->
			  		<h2 class="card-title">Estados de los proyectos</h2>
			  		<div class="indicador">
			  			<!--TODO Grafica estados de proyectos-->
                        <div class="indicador__grafica">[Gráfica]</div>
                    </div>
			  	</div>
			  	<div class="tab-pane fade" id="nav-recursos" role="tabpanel" aria-labelledby="nav-recursos-tab">
                    <!--Estadísticas del uso de recursos-->
			  		<h2 class="card-title">Uso de recursos</h2>
			  		<div class="indicador">
			  			<!--TODO Grafica de uso de recursos-->
                        <div class="indicador__grafica">[Gráfica]</div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="nav-tiempos" role="tabpanel" aria-labelledby="nav-tiempos-tab">
                    <!--Estadps de los proyectos del sistema-->
			  		<h2 class="card-title">Estimaciones de tiempos de proyectos</h2>
			  		<div class="indicador">
			  			<!--TODO Grafica de estados de proyectos-->
                        <div class="indicador__grafica">[Gráfica]</div>
                    </div>
			  	</div>
			</div>	
	</div>
@endsection