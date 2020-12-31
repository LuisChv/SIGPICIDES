@extends('layouts.app',['pageSlug' => 'informes.proyecto'])
@section('title')
    Estadísticas del sistema
@endsection
@section('content')
	<div class="row">
		<div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Estadísticas por proyecto</h2>
                </div>
                <div class="card-body">
                    <table class="table">
                    @foreach($proyectos as $proyecto)
                        <tr>
                            <td>
                                <h3><b>Proyecto:</b> {{$proyecto->nombre}}</h3>
                                <p><b>Tiempo estimado:</b> </p> 
                                    <div class="progreso_container">
                                        <div class="progress">
                                            <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{($proyecto->estimado/$mayor)*100}}%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">{{$proyecto->estimado}} semanas</div>
                                        </div>
                                    </div>
                                    <hr>
                                <p><b>Tiempo actual:</b> </p>
                                    <div class="progreso_container">
                                        <div class="progress">
                                            <div class="progress-bar bg-default progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{($proyecto->real/$mayor)*100}}%;" aria-valuenow="{{($proyecto->real/$proyecto->estimado)*100}}" aria-valuemin="0" aria-valuemax="100">{{round($proyecto->real)}} semanas</div>
                                        </div>
                                    </div>
                            </td>
                        </tr>
                    @endforeach

                        

                    </table>
                </div>
            </div>
		</div>
	</div>
@endsection