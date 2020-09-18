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
                            <h2 class="card-title"><b>Solicitudes Nuevas</b></h2>
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
                                <div class="btn-group" role="group">
                                    <a title="Comite de Evaluacion" type="button" class="btn btn-info btn-sm btn-icon btn-round" href="{{ route('comite.index', [$soli->id_proy])}}">
                                    <i class="tim-icons icon-single-02"></i>
                                    </a>
                                    <a title="Eliminar" type="button" class="btn btn-warning btn-sm btn-icon btn-round" href="">
                                        <i class="tim-icons icon-simple-remove"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>                        
                        @endforeach
                    </table>
                </div>
                <div class="card-footer"><br></div>
            </div>
        </div>
        
</div>
@endsection