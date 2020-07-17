<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h2>Hola {{$name}}, bienvenido a SIGPICIDES!</h2>
    <p>Por favor confirma tu correo electrónico</p>
    <p>Para ello simplemente debes hacer click en el siguiente enlace:</p>
    <a href="{{url('register/verify/'.$confirmation_code)}}">
        Clic para confirmar su correo electrónico
    </a>
    <br>
    <p>Si no has creado una cuenta con nosotros, ignora este correo.</p>
</body>
</html>