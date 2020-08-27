@extends('layouts.app',['pageSlug' => 'dashboard'])
@section('title')
    Nueva investigación
@endsection
@section('content')
<div class="row">
    <div class="col-12">
            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-12 text-left">
                            <h2 class="card-title"><b>Solicitud de proyecto de investigación</b></h2>
                        </div>
                    </div>
                </div>                                    
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Nombre</th>
                                <td> Investigación título</td>
                            </tr>
                            <tr>
                                <th>Subtipo de investigación</th>
                                <td> Investigación subtipo N</td>
                            </tr>
                            <tr>
                                <th>Descripción</th>
                                <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</td>
                            </tr>
                            <tr>
                                <th>Objetivos</th>
                                <td> *Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.<br><br>
                                *Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.<br><br>
                                *Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.  </td>
                            </tr>
                            <tr>
                                <th>Alcances</th>
                                <td> *At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.  </td>
                            </tr>
                            <tr>
                                <th>Factibilidad</th>
                                <td>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</td>
                            </tr>
                            <tr>
                                <th>Recursos</th>
                                <td>
                                    <table width="100%">
                                        <tr>
                                            <th>Nombre de recurso 1</th>
                                            <th>Cantidad</th>
                                            <th>Detalle</th>
                                        </tr>
                                        <tr>
                                            <td>Nombre de recurso 1</td>
                                            <td>1</td>
                                            <td>>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates</td>
                                        </tr>
                                        <tr>
                                            <td>Nombre de recurso 3</td>
                                            <td>3</td>
                                            <td>Voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus</td>
                                        </tr>
                                        <tr>
                                            <td>Nombre de recurso 4</td>
                                            <td>3</td>
                                            <td>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <th>Miembros</th>
                                <td>
                                    <table width="100%">
                                        <tr>
                                            <th>Rol</th>
                                            <th>Nombre</th>
                                        </tr>
                                        <tr>
                                            <td>Líder</td>
                                            <td>Concepción de María Orellana Ginea</td>
                                        </tr>
                                        <tr>
                                            <td>Investigador adjunto</td>
                                            <td>Alejandro Josué Martínez López</td>
                                        </tr>
                                        <tr>
                                            <td>Investigador adjunto</td>
                                            <td>Luis Enrique Chávez Orellana</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <th>Planificación</th>
                                <td>
                                    <table width="100%">
                                        <tr>
                                            <th>Hitos</th>
                                            <th>Indicadores</th>
                                        </tr>
                                        <tr>
                                            <td>Título hito 1</td>
                                            <td>Nombre indicador 1</td>
                                        </tr>
                                        <tr>
                                            <td>Título hito 2</td>
                                            <td>Nombre indicador 2</td>
                                        </tr>
                                        <tr>
                                            <td>Título hito 3</td>
                                            <td>Nombre indicador 3</td>
                                        </tr>
                                         <tr>
                                            <td></td>
                                            <td>Nombre indicador 4</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                        </table>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary" href="{{route('solicitud.index')}}">Finalizar</a> <br><br>              
                    </div>                    
            </div>
        </div>
</div>
@endsection
