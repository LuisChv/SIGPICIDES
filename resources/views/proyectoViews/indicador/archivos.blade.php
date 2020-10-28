@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
    archivos
@endsection
@section('content')
<div class="row">
    <div class="col-12">
            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-12 text-left">
                            <h2 class="card-title"><b>Prueba de archivos</b></h2>
                        </div>
                    </div>
                </div>
                <form class="form" method="POST" action="{{ route('archivos.store')}}" enctype="multipart/form-data">
                    @csrf                                    
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>
                                    <input type="file" name="files[]" class="form-control border" multiple required>
                                </td>
                                <td>
                                    <button class="btn btn-success btn-sm btn-icon btn-round"> <i class="tim-icons icon-simple-add"></i></button>
                                </td>
                            </tr>

                            @foreach($files as $file)
                            <tr class="archivo">
                                <td>{{$file->id}}</td>
                                <td><i class="icon icon-file"></i></td>
                                <td>
                                    <p class="archivo_doc">{{$file->nombre}}</p>
                                </td>
                                <td><a href="{{ route('archivos.download', $file->id) }}">Descargar</a></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary" href="#">Siguiente &nbsp;&nbsp;&nbsp;<i class="tim-icons icon-double-right font-weight-bold"></i></a> <br><br>              
                    </div>                    
                </form>
            </div>
        </div>
</div>
@endsection
