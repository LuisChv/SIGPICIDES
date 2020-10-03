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
                <form class="form" method="POST" action="">
                    @csrf                                    
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>
                                    <input name="archivo" class="form-control border" type="file">
                                </td>
                                <td>
                                    <button class="btn btn-success btn-sm btn-icon btn-round"> <i class="tim-icons icon-simple-add"></i></button>
                                </td>
                            </tr>
                            <tr class="archivo">
                                <td><img src="#"></td>
                                <td>
                                    <p class="archivo_doc">archivo.docx</p>
                                </td>
                            </tr>
                            <tr class="archivo">
                                <td><img src="#"></td>
                                <td>
                                    <p class="archivo_ppt">archivo.ppt</p>
                                </td>
                            </tr>
                            <tr class="archivo">
                                <td><img src="#"></td>
                                <td>
                                    <p class="archivo_xls">archivo.xls</p>
                                </td>
                            </tr>
                            <tr class="archivo">
                                <td><img src="#"></td>
                                <td>
                                    <p class="archivo_pdf">archivo.pdf</p>
                                </td>
                            </tr>
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
