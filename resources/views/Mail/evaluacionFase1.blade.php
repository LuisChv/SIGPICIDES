<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        @if ({{$etapa}}==1)
            <h3>Hola {{$name}}, este email es para notificarte que la solicitud de tu proyecto: "{{$nombreProyecto}}" ha sido evaluado.</h3>            
            <p>Por favor revisa la evaluación en la sección de solicitudes o dando click en el siguiente enlace: </p>
            <a href="{{url('mis_solicitudes')}}">
                Evaluación
            </a>
        @else
            <h3>Hola {{$name}}, este email es para notificarte que la etapa dos de tu proyecto: "{{$nombreProyecto}}" ha sido evaluado.</h3>            
            <p>Por favor revisa la evaluación en la sección de solicitudes o dando click en el siguiente enlace: </p>
            <a href="{{url('mis_solicitudes')}}">
                Evaluación
            </a>
        @endif  
        
    </body>
</html>
<style>
    a{
        text-decoration: none
    }
</style>