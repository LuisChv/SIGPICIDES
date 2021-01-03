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
							<h2 class="card-title">Investigaciones</h2>
						</div>
						<div class="card-body">
							<nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded">                                
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <form action="{{route('estadistica.filtradas')}}" id="formFiltrarProyecto" method="get">                                
                                    <div class="collapse navbar-collapse" id="main_nav">                                
                                        <ul class="navbar-nav">                                
                                        <li class="nav-item dropdown">
                                            <p id="botonSeleccionadorProyectoFiltro" class="btn btn-secondary text-white" data-toggle="dropdown">{{$nombreElegido ?? 'Todos los proyectos'}} &nbsp;<i class="tim-icons icon-minimal-down"></i></p>
                                            <ul class="dropdown-menu">
                                                <li><a onclick="filtrotipo(this,0)" class="dropdown-item text-dark">Todos los proyectos</a>
                                            @foreach ($tiposProy as $tipo)
                                                <li><a  onclick="filtrotipo(this,1)" class="dropdown-item text-dark">{{$tipo->nombre}}</a>
                                                    <ul class="submenu dropdown-menu">
                                                        @foreach ($subtiposProy as $subtipo)
                                                            @if ($subtipo->id_tipo==$tipo->id)
                                                            <li><a onclick="filtrotipo(this,2)" class="dropdown-item text-dark">{{$subtipo->nombre}}</a></li>    
                                                            @endif 
                                                        @endforeach                                                
                                                    </ul>
                                                </li>
                                            @endforeach                                                                               
                                            </ul>
                                        </li>                                                     
                                        </ul>                                    
                                        <input name="nombre" id="ocultoNombreProyecto" value="{{$nombreElegido ?? 'Todos los proyectos'}}" type="text" hidden>
                                        <input name="tisubti" id="ocultoTipoProyecto" value="{{$tisubtiElegido ?? '0'}}" type="text" hidden>
                                        <select name="estadoProy" id="estadoProy" class="botondash"> 
                                            <option value="0">Todos los estados</option>
                                            @foreach ($estados as $estado)
                                            @if ($estado->id==$estadoElegido)
                                            <option value="{{$estado->id}}" selected>{{$estado->estado}}</option>    
                                            @else
                                            <option value="{{$estado->id}}">{{$estado->estado}}</option>
                                            @endif                                        
                                            @endforeach                                
                                        </select>
                                        <button class="btn btn-default botondash2" type="submit" form="formFiltrarProyecto">Buscar</button>                                    
                                    </div> <!-- navbar-collapse.// -->
                                </form>
                            </nav>
							<div class="indicador">
								<!--TODO Grafica de uso de recursos-->
								<div class="indicador__grafica">
									<canvas id="tipo_inv"></canvas>								
								</div>
							</div> 
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