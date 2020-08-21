@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
	Consultar solicitudes 
@endsection
@section('content')
<div class="row">
	<div class="col-12">
            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-8 text-left">
                            <h2 class="card-title"><b>Solicitudes pendientes de aprobación</b></h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        @foreach ($solicitudes as $soli)
                        <tr>
                            <td>
                                <p>{{ $soli->nombre }}</p> 
                            </td>
                            <td width="5%" align="right">
                                <a type="button" href="#" class="btn btn-success btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-pencil"></i></a>
                            </td>
                            <td width="5%" align="right">
                                <a type="button" href="#" class="btn btn-warning btn-sm btn-icon btn-round"><i class="tim-icons icon-simple-remove"></i></a>
                            </td>
                        </tr>                        
                        @endforeach
                        <tr>
                            <td>
                                <p>default 1 laaaaaaaarrrrrrrrrrrrrrrrrrrrrrrgo</p> 
                            </td>
                            <td width="5%" align="right">
                                <a type="button" href="#" class="btn btn-success btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-pencil"></i></a>
                            </td>
                            <td width="5%" align="right">
                                <a type="button" href="#" class="btn btn-warning btn-sm btn-icon btn-round"><i class="tim-icons icon-simple-remove"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>default 2</p>
                            </td>
                            <td width="5%" align="right">
                                <a type="button" href="#" class="btn btn-success btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-pencil"></i></a>
                            </td>
                            <td width="5%" align="right">
                                <a type="button" href="#" class="btn btn-warning btn-sm btn-icon btn-round"><i class="tim-icons icon-simple-remove"></i></a>
                            </td>
                        </tr>
                            <td>
                                <p>default 4</p>
                            </td>
                            <td width="5%" align="right">
                                <a type="button" href="#" class="btn btn-success btn-sm btn-sm btn-icon btn-round"><i class="tim-icons icon-pencil"></i></a>
                            </td>
                            <td width="5%" align="right">
                                <a type="button" href="#" class="btn btn-warning btn-sm btn-icon btn-round"><i class="tim-icons icon-simple-remove"></i></a>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer"><br></div>
            </div>
        </div>
        <div class="container menuF-container">
            <input type="checkbox" id="toggleF">
            <label for="toggleF" class="buttonF"></label>
            <nav class="navF">
                <a href="{{ route('solicitud.create')}}">Nueva solicitud</a>
                <!--a href="{{ route('cides') }}">Acerca de</a>
                <a href="#">Acciones largaaaaaaaaas</a-->
            </nav>
        </div>
</div>
@endsection