@extends('proyectoViews.indicador.show',['pageSlug' => 'estadistica'])
@section('title')
    Indicador | Estadística
@endsection
@section('seccion')

<div>
    <div class="row">
        @if ($indicador->tipo_de_grafico)
        <div class="col-md-9">
            <div class="card">
            <div class="card-header">
                <h2>{{$indicador->detalle}}</h2>

                <!-- GRAFICO-->
                <canvas id="graficoBarras"></canvas>

            </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{route('datos.barra')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                
                            </div>
                            <div class="col-md-6 text-center">
                                Valor
                            </div>
                        </div>
                        <hr>
                        @foreach ($variables as $variable)
                            @if ($variable->id_indicador)
                            
                                <div class="row">
                                    <div class="col-md-6">
                                        {{$variable->nombre}}
                                    </div>
                                    <div class="col-md-6">
                                        <input required name="{{$variable->id}}" class="form-control form-control-sm" type="number" step="0.01" 
                                        @foreach ($valores as $valor)
                                            @if ($valor->id_variable==$variable->id)
                                                value="{{$valor->valor_y}}"
                                                @break
                                            @endif
                                        @endforeach
                                        >
                                    </div>
                                </div>
                                <hr>
                            @endif
                        @endforeach
                        <div class="text-center">
                            <input hidden name="indicador" value="{{$indicador->id}}"/>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                    <br>
                </div>
            </div>
        </div>
        @else
            <div class="col-md-8">
                <div class="card">
                <div class="card-header">
                    <h2>{{$indicador->detalle}}</h2>
                    <!-- GRAFICO-->
                    <canvas id="graficoLineas"></canvas>
                
                </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                                <select class="btn btn-sm btn-primary dropdown-toggle" id="selectorVariables">
                                    <option>Variables</option>
                                    @foreach ($variables as $variable)
                                        @if($variable->id_indicador == $indicador->id)
                                            <option value="{{$variable->id}}" >
                                                {{$variable->nombre}}
                                            </option>                                   
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalVariable">+</button>
                                  <form method="POST" action="{{route('datos.punto')}}">
                                      @csrf
                                      <div class="modal fade" id="modalVariable" tabindex="-1" role="dialog" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h5 class="modal-title">Agregar punto</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="false">&times;</span>
                                                      </button>
                                                  </div>
                                                  <div class="modal-body" >                     
                                                      <div class="row">
                                                          <div  class="mr-auto ml-auto col-md-12">
                                                            <select required class="form-control" name="variable">
                                                                <option selected disabled hidden value="" >Seleccione una variable...</option>
                                                                @foreach ($variables as $variable)
                                                                    @if($variable->id_indicador == $indicador->id)
                                                                        <option value="{{$variable->id}}">
                                                                            {{$variable->nombre}}
                                                                        </option>                                   
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                          </div>
                                                      </div>
                                                      <hr>
                                                      <div class="row">
                                                            <div class="mr-auto ml-auto col-md-6">
                                                                <input required name="x" class="form-control" type="number" step="0.01" placeholder="Valor en X">
                                                            </div>
                                                            <div class="mr-auto ml-auto col-md-6">
                                                                <input required name="y" class="form-control" type="number" step="0.01" placeholder="Valor en Y">
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
                        <form method="POST" action="{{route('datos.linea')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <b>Eje X</b>
                                </div>
                                <div class="col-md-6 text-center">
                                    <b>Eje Y</b>
                                </div>
                            </div>
                            <br>
                            @foreach ($variables as $variable)
                                <div style="display: none" class="hideCustom" id="container{{$variable->id}}">
                                    <table class="table" id="tabla{{$variable->id}}">
                                        <tbody>
                                            @foreach ($valores as $valor)
                                                @if ($valor->id_variable == $variable->id)
                                                    <tr>
                                                        <td>
                                                            <input required name="x{{$valor->id}}" class="form-control form-control-sm" type="number" step="0.01" value="{{$valor->valor_x}}">
                                                        </td>
                                                        <td>
                                                            <input required name="y{{$valor->id}}" class="form-control form-control-sm" type="number" step="0.01" value="{{$valor->valor_y}}">
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endforeach
                            <div class="text-center">
                                <input hidden name="indicador" value="{{$indicador->id}}"/>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
<script>
    $( document ).ready(function() {
            let flag = {!! json_encode($indicador->tipo_de_grafico) !!};
            //console.log(flag);
            if(flag){
                let labels =  {!! json_encode($variables) !!};
                let valores = {!! json_encode($valores) !!};
                console.log("WRYYYYYYYYYYYYYYYYYY");
                //console.log(labels);
                //console.log(valores);
			    procesarChart(labels, valores, 'graficoBarras', 'nombre', 'valor_y');
            }
            
		});
    $(function(){
        $("#selectorVariables").on("change", function () {
            $(".hideCustom").hide();
            $("div[id='container" + $(this).val() + "']").show();

            let vars =  {!! json_encode($variables) !!};
            let vals = {!! json_encode($valores) !!};
            let idVar = $(this).children("option:selected").val();
            procesarLines(idVar, vars, vals, 'graficoLineas');
            console.log("ejecuta hasta procesar lines");
        });
    });
</script>

@endsection