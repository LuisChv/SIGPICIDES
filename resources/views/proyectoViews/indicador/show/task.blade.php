@extends('proyectoViews.indicador.show',['pageSlug' => 'mis_proyectos'])
@section('title')
    Indicador | Tareas
@endsection
@section('seccion')

<div>
    <!--Area que lista las tareas que se relacionan al indicador-->
    <table class="table">
        <tr>
            <th>Tarea</th>
            <th>Asignada</th>
            <th>Avance</th>
            <th>Estado</th>
        </tr>
        @foreach ($tareas as $tarea)
            <tr>
                <td>{{$tarea->text}}</td>
                <td>
                    @foreach ($usuarios as $usuario)
                        @if ($usuario->id_task == $tarea->id)
                            {{$usuario->name}} <br>
                        @endif
                    @endforeach
                </td>
                <td>{{$tarea->progress*100}} %</td>
                <td>
                    @if ($tarea->progress == 1)
                        Completada
                    @else
                        En proceso
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
</div>

@endsection