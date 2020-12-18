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
                        <tr>
                            <td>
                                <p><b>Proyecto:</b> [[Nombre proyecto]]</p>
                                <p><b>Progreso estimado:</b> </p> 
                                    <div class="progreso_container">
                                        <div class="progress">
                                            <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: 55%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                                <p><b>Progreso actual:</b> </p>
                                    <div class="progreso_container">
                                        <div class="progress">
                                            <div class="progress-bar bg-default progress-bar-striped progress-bar-animated" role="progressbar" style="width: 50%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                        </div>
                                    </div>
                            </td>
                        </tr>



                        <tr>
                            <td>
                                <p><b>Proyecto:</b> [[Nombre proyecto]]</p>
                                <p><b>Progreso estimado:</b> </p> 
                                    <div class="progreso_container">
                                        <div class="progress">
                                            <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: 55%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                                <p><b>Progreso actual:</b> </p>
                                    <div class="progreso_container">
                                        <div class="progress">
                                            <div class="progress-bar bg-default progress-bar-striped progress-bar-animated" role="progressbar" style="width: 50%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                        </div>
                                    </div>
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <p><b>Proyecto:</b> [[Nombre proyecto]]</p>
                                <p><b>Progreso estimado:</b> </p> 
                                    <div class="progreso_container">
                                        <div class="progress">
                                            <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: 55%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                                <p><b>Progreso actual:</b> </p>
                                    <div class="progreso_container">
                                        <div class="progress">
                                            <div class="progress-bar bg-default progress-bar-striped progress-bar-animated" role="progressbar" style="width: 50%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                        </div>
                                    </div>
                            </td>
                        </tr>

                        

                    </table>
                </div>
            </div>
		</div>
	</div>
@endsection