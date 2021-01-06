@extends('proyectoViews.indicador.show',['pageSlug' => 'general'])
@section('title')
    Indicador | General
@endsection
@section('seccion')

<div>
    <!--Descripcion general indicador-->
    <div class="row">
        
      <!-- INICIO DE IF A -->
      
      @if ($indicador->modificable)
          <h2 class="col-md-8 card-title">{{$indicador->detalle}}</h2>
          <div class="col-md-4 text-right">
              @if (!$indicador->tipo || count($variables) > 1)
                <a href="{{ route('indicador.confirmar', $indicador->id) }}" class="btn btn-primary">Confirmar</a>   
              @endif
          </div>
          <div class="col-md-6">
              <div class="card">
                  <div class="card-body">
                      <div class="row">

                          <!-- INICIO DE IF A.1 -->
                          @if($indicador->tipo)
                              <div class="col-md-6">
                                  Tipo de indicador: 
                              </div>
                              <div class="col-md-6 text-right">
                                  <div class="btn-group">
                                      <a href="{{ route('indicador.tipo', $indicador->id) }}" class="btn btn-primary btn-sm">Cualitativo</a>
                                      <a disabled href="{{ route('indicador.tipo', $indicador->id) }}" class="btn btn-primary btn-sm">Cuantitativo</a>
                                  </div>
                              </div>

                              <!-- INICIO DE IF A.1.1 -->
                              @if($indicador->tipo_de_grafico)
                                  <div class="col-md-6">
                                      Tipo de gráfico: 
                                  </div>
                                  <div class="col-md-6 text-right">
                                      <div class="btn-group">
                                          <a href="{{ route('indicador.tipo_grafico', $indicador->id) }}" class="btn btn-primary btn-sm">Líneas</a>
                                          <a disabled href="{{ route('indicador.tipo_grafico', $indicador->id) }}" class="btn btn-primary btn-sm">Barras</a>
                                      </div>
                                  </div>

                              <!-- INICIO DE ELSE A.1.1  -->
                              @else
                                  <div class="col-md-6">
                                      Tipo de gráfico: 
                                  </div>
                                  <div class="col-md-6 text-right">
                                      <div class="btn-group">
                                          <a disabled href="{{ route('indicador.tipo_grafico', $indicador->id) }}" class="btn btn-primary btn-sm">Líneas</a>
                                          <a href="{{ route('indicador.tipo_grafico', $indicador->id) }}" class="btn btn-primary btn-sm">Barras</a>
                                      </div>
                                  </div>
                              @endif
                              <!-- FIN DE IF A.1.1  -->
                              
                          <!-- INICIO DE ELSE A.1 -->
                          @else
                              <div class="col-md-6">
                                  Tipo de indicador: 
                              </div>
                              <div class="col-md-6 text-right">
                                  <div class="btn-group">
                                      <a disabled href="{{ route('indicador.tipo', $indicador->id) }}" class="btn btn-primary btn-sm">Cualitativo</a>
                                      <a href="{{ route('indicador.tipo', $indicador->id) }}" class="btn btn-primary btn-sm">Cuantitativo</a>
                                  </div>
                              </div>
                          @endif
                          <!-- FIN DE IF A.1 -->

                      </div>
                  </div>
                  
                  <br>
              </div>
          </div>

          <!-- IF VARIABLES -->
          @if($indicador->tipo)
              <div class="col-md-6">
                  <div class="card">
                      <div class="card-body">
                          <div class="row">
                              <div class="col-md-8">
                                  Variables
                              </div>
                              <div class="col-md-4 text-right">
                                  <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalVariable">+</button>
                                  <form method="POST" action="{{route('indicador.variable')}}">
                                      @csrf
                                      <div class="modal fade" id="modalVariable" tabindex="-1" role="dialog" aria-hidden="true">
                                          <div class="modal-dialog modal-lg" role="document">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h5 class="modal-title">Agregar variable</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="false">&times;</span>
                                                      </button>
                                                  </div>
                                                  <div class="modal-body" >                     
                                                      <div class="row">
                                                          <div class="mr-auto ml-auto col-md-6">
                                                              <input required id="nombre" class="form-control" placeholder="Nombre" name="nombre">
                                                          </div>
                                                          <div class="mr-auto ml-auto col-md-6">
                                                              <input readonly maxlength="7" id="color" class="form-control" placeholder="Color (2395FC)" name="color">
                                                          </div>
                                                          <input hidden name="id_indicador" value="{{$indicador->id}}"/>
                                                      </div>
                                                  </div>
                                                  <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                      <button type="submit" class="btn btn-primary">Añadir</button>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </form> 
                              </div>
                          </div>
                          <br>
                          <table class="table">
                              @foreach ($variables as $variable)

                              <!-- INICIO DE IF A.1.2  -->
                                  @if ($variable->id_indicador)
                                      <tr>
                                          <td>
                                              {{$variable->nombre}}
                                          </td>
                                          <td class="text-right">
                                              <i style="color:{{$variable->color}}" class="fas fa-tint fa-2x"></i>
                                          </td>
                                          <form id="formulario_variable{{$variable->id}}" method="POST" action="{{route('variable.destroy')}}">
                                              @csrf
                                              @method('DELETE')
                                              <td class="text-right">
                                                  <input hidden name="variable" value="{{$variable->id}}"/>
                                                  <button type="button" class="btn btn-warning btn-sm btn-round btn-icon" onclick="confirmar('_variable{{$variable->id}}')">
                                                      <i class="tim-icons icon-simple-remove"></i>
                                                  </button>
                                              </td>
                                          </form>
                                      </tr>
                                  @endif
                                  <!-- FIN DE IF A.1.2  -->

                              @endforeach
                          </table>						
                      </div>
                  </div>
              </div>
          @endif
          <!-- FIN DE IF VARIABLES -->
          
        <!-- ELSE DE IF A -->
        @else
          <h2 class="col-md-8 card-title">{{$indicador->detalle}}</h2>
          <div class="col-md-4 text-right">
              @if ($indicador->finalizado)
                <h2 class="text-right text-primary text-uppercase">Finalizado</h2>
              @else
                <form method="POST" action="{{route('indicador.finalizar')}}">
                    @csrf
                    <input hidden name="id_indicador" value="{{$indicador->id}}">
                    <button class="btn btn-primary btn-sm btn-icon" title="Finalizar"><i class="tim-icons icon-check-2"></i></button>
                </form>
              @endif
                  
          </div>
          <div class="card">
              <div class="card-body">
                  <div class="row">
                      <div class="col-md-8">
                          <p class="font-weight-bold">Descripción</p>
                      </div>
                      <div class="col-md-4 text-right">
                          <button class="btn btn-primary btn-sm btn-icon" data-toggle="modal" data-target="#modalDescripcion"><i class="tim-icons icon-pencil"></i></button>
                                  <form method="POST" action="{{route('indicador.descripcion')}}">
                                      @csrf
                                      <div class="modal fade" id="modalDescripcion" tabindex="-1" role="dialog" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h5 class="modal-title">Actualizar descripción de avance</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="false">&times;</span>
                                                      </button>
                                                  </div>
                                                  <div class="modal-body" >                     
                                                      <div class="row">
                                                          <div class="mr-auto ml-auto col-md-12">
                                                              <textarea class="inputArea" name="descripcion" rows="3" maxlength="750"></textarea>	
                                                          </div>
                                                          <input hidden name="id_indicador" value="{{$indicador->id}}"/>
                                                      </div>
                                                  </div>
                                                  <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                      <button type="submit" class="btn btn-primary">Añadir</button>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </form>
                      </div>
                  </div>
                  <hr>
                  <p>{{$indicador->descrip_avance}}</p><br>

                  @if($indicador->tipo)
                      <p class="font-weight-bold">Tipo de indicador: Cuantitativo</p><hr>
                  @else
                      <p class="font-weight-bold">Tipo de indicador: Cualitativo</p><hr>
                  @endif

                   <form class="form" method="POST" action="{{ route('archivos.indicador.store', $indicador->id )}}" enctype="multipart/form-data">
                            @csrf  
                            <br><h4 class ="title">AVANCE INDICADOR </h4>
                            <input type="file" name="files[]" class="form-control border" multiple>
                            <div class="normal-box">
                                <table class="col-md-12">
                                    <tr>
                                        <p>  <center> <b> Archivos disponibles </b> </center> </p>
                                    </tr>
                                    <!--Listar los archivos que ya estan subidos-->                           
                            
                                @foreach($files as $file)
                                <tr class="archivo">
                                    <td>{{$file->id}}</td>
                                    <td><i class="icon icon-file"></i></td>
                                    <td>
                                        <p class="archivo_doc">{{$file->nombre}}</p>
                                    </td>
                                    <td><a href="#">Descargar</a></td>
                                </tr>
                                @endforeach

                                </tr>
                                </table>

                                <br><p class ="title">Descripcion de Avance </p>
                                <input type="text" class= "inputArea" name="descripcionAvance" placeholder="Descripción del avance" maxlength="900"><br>
                            </div> 

                            <div>
                                <button class="btn btn-primary" id = "agregarArchivo" ><i class="tim-icons icon-attach-87" title="Agregar archivos"></i></button>  
                            </div>
                                     
                        </form>
                  <br>
                  <p class="font-weight-bold">Comentarios:</p>
                  <hr>  
                  <div id="ListaComentariosIndicador" class="comment-box cuadroComentario" style="background-color: gainsboro; max-height: 400px;">
                    @foreach ($comentarios as $comentario)
                        <p class="font-weight-bold">{{$comentario->name}}:</p>
                        <p >{{$comentario->comentario}}</p>
                        <hr>
                    @endforeach                    
                  </div>
                  <br>                             
                  @if (!$miembro && $proyecto->id_estado==1)
                  <table class="col-md-12">
                    <tr>
                        <td width="100%" align="left">
                            <textarea id="ComentarioIndicador" class="inputArea" rows="4" name="comentario" placeholder="Escribir un comentario..." maxlength="900"></textarea>
                        </td>
                        <td align="left">
                        <button id="BotonGuardarComentarioI" onclick="agregarComentarioIndicador({{$indicador->id}})" class="btn btn-sm btn-primary btn-round btn-icon" title="Añadir comentario"><i class="tim-icons icon-chat-33"></i></button>
                        
                        </td>
                    </tr>
                  </table>
                  @endif 
              </div>
              
          </div>
          
        @endif
    <!-- FIN DE IF A -->
    </div>	
</div>

<script>
    $("#color").spectrum({
        color: "#4d71dd"
    });    
</script>
@endsection



