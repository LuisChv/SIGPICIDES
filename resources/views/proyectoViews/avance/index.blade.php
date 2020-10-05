@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
    Indicadores
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header ">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="card-title">Avances</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Titulo</th>
                        <th>Fecha</th>
                    </tr>
                     <tr>
                        <td>[Titulo avance 1]</td>
                        <td>[DD/MM/YYYY]</td>
                    </tr>
                    <tr>
                        <td>[Titulo avance 2]</td>
                        <td>[DD/MM/YYYY]</td>
                    </tr>
                    <tr>
                        <td>[Titulo avance 3]</td>
                        <td>[DD/MM/YYYY]</td>
                    </tr>
                    <tr>
                        <td>[Titulo avance 4]</td>
                        <td>[DD/MM/YYYY]</td>
                    </tr>
                </table>
            </div>                            
        </div>
    </div>
</div>
@endsection
