@extends('layouts.app',['pageSlug' => 'colaboraciones'])
@section('title')
Colaboraciones
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <h2 class="card-title">Proyectos en los que colaboro</h2>
                    </div>
                </div>
            </div>
            @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li class="alerta-error">
                        {{ $error }}&nbsp;&nbsp;<i class="tim-icons icon-alert-circle-exc"></i>
                        </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">                
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <table class="table tablesorter">
                            <tr>
                                <th>Nombre del proyecto</th>
                                <th>Mi rol en proyecto</th>
                            </tr>
                            <div class="container">
                            @foreach ($colaboraciones as $colab)
                                <tr id="{{$colab->id}}" onMouseOver="ResaltarFila({{$colab->id}});" onMouseOut="RestablecerFila({{$colab->id}}, '')"  onClick="CrearEnlace('{{ route('solicitud.resumen', $colab->id)}}');">
                                    <td>{{$colab->nombre ?? 'nombre proyecto'}}</td>
                                    @if ($colab->id_rol==6)
                                        <td>{{"Investigador Adjunto"}}</td>
                                    @elseif ($colab->id_rol==7)
                                        <td>{{"Colaborador"}}</td>
                                    @endif                                    
                                </tr> 
                            @endforeach                            
                            </div>                                                       
                        </table>
                        <div class="d-flex justify-content-center">
                            {!! $colaboraciones->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection