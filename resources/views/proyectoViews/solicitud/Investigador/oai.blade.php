@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
	Consultar solicitudes 
@endsection
@section('content')
<div class="row">
    <div class="col-4">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-8 text-left">
                        <h2 class="card-title"><b>Objetivos</b></h2>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    @foreach ($objetivos as $objetivo)
                        <td>
                            <i class="tim-icons icon-compass-05"></i>
                        </td>
                        <td>
                            {{$objetivo->descripcion}}
                        </td>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <div class="col-4">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-8 text-left">
                        <h2 class="card-title"><b>Alcances</b></h2>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    @foreach ($alcances as $alcance)
                        <td>
                            <i class="tim-icons icon-wifi"></i>
                        </td>
                        <td>
                            {{$alcance->descripcion}}
                        </td>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <div class="col-4">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-8 text-left">
                        <h2 class="card-title"><b>Indicadores</b></h2>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    @foreach ($indicadores as $indicadores)
                        <td>
                            <i class="tim-icons icon-sound-wave"></i>
                        </td>
                        <td>
                            {{$alcance->detalle}}
                        </td>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection