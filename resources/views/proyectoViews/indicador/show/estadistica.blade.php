@extends('proyectoViews.indicador.show',['pageSlug' => 'estadistica'])
@section('title')
    Indicador | Estadística
@endsection
@section('seccion')

<div>
    <!--Las estadisticas son solo para los indicadores cuantitativos, hay que validar que no se genere este tab-->
    <h2 class="card-title">{{$indicador->detalle}}</h2>
    <div class="indicador">
        <!--TODO Se debe decidir como ira la interfaz para el llenado de datos de la grafica-->
          <div class="indicador__grafica">[Gráfica]</div>
    </div>
    <!-- INICIO DE IF A.2 -->
    @if ($indicador->tipo_de_grafico)
          <div class="col-md-12 text-right">
              <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalBarra">Modificar datos</button>
              <form method="POST" action="{{route('datos.barra')}}">
                  @csrf
                  <div class="modal fade" id="modalBarra" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title">Modificar datos</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="false">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body" >   
                                  <div class="row">                
                                      @foreach ($variables as $variable)
                                          <!-- INICIO DE IF A.2.1  -->
                                          @if ($variable->id_indicador)
                                              <div class="col-md-3">
                                                  {{$variable->nombre}}
                                              </div>
                                              <div class="col-md-3">
                                                  <input required name="{{$variable->id}}" class="form-control form-control-sm" type="number" step="0.01" value="{{$variable->valor_y}}">
                                              </div>
                                          @endif
                                      <!-- FIN DE IF A.2.1  -->

                                      @endforeach
                                  </div>
                              </div>
                              <div class="modal-footer">
                                  <input hidden name="indicador" value="{{$indicador->id}}">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                  <button type="submit" class="btn btn-primary">Guardar</button>
                              </div>
                          </div>
                      </div>
                  </div>
              </form>
          </div>
  <!-- INICIO DE ELSE A.2 
  @e lse
      <div class="col-md-12">
          <div class="btn-group" role="group">
              <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Variables
              </button>
              <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
              @foreach ($variables as $variable)
                  
                       INICIO DE IF A.2.2 
                  @if($variable->id_indicador == $indicador->id)
                      <button type="button" class="form-control" data-toggle="modal" data-target="#modalLinea" onclick="modalLinea({{$variable->id}})">
                          {{$variable->nombre}}
                      </button>                                   
                  @endif
                       FIN DE IF A.2.2 

              @endforeach
              </div>
          </div>
      </div>
  @e ndif
  FIN DE IF A.2 -->
  @else
      <div class="col-md-12">
              <select class="btn btn-primary dropdown-toggle" id="selectorVariables">
                <option>-Variables-</option>
              @foreach ($variables as $variable)
                  
                      <!-- INICIO DE IF A.2.2 -->
                  @if($variable->id_indicador == $indicador->id)
                      <option value="{{$variable->id}}">
                          {{$variable->nombre}}
                      </option>                                   
                  @endif
                      <!-- FIN DE IF A.2.2 -->

              @endforeach
              </select>
              @foreach ($variables as $variable)
              <div class="hideCustom" id="container{{$variable->id}}">
                <table class="table" id="tabla{{$variable->id}}">
                    <thead>
                        <tr>
                            <th>Eje 1</th>
                            <th>Eje 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <button class="btn btn-primary">+</button>
                            </td>
                        </tr>
                        <tr>
                            <td>asdf</td>
                            <td>ghjk {{$variable->id}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
              @endforeach
      </div>
  @endif
</div>

<script>
    $(function(){
        $("#selectorVariables").on("change", function () {
            $(".hideCustom").hide();
            $("div[id='container" + $(this).val() + "']").show();
        });
    });
</script>

@endsection