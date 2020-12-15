<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Proforma</h1>
    <p>Este es mi primer correo que enviaré por laravel</p>

    <p><strong>Kit: </strong>{{$contacto['kit']}}</p>
    <p><strong>Precio: </strong>{{$contacto['precio']}}</p>
    <p><strong>Nombre: </strong>{{$contacto['nombre']}}</p>
    <p><strong>Correo: </strong>{{$contacto['correo']}}</p>
    <p><strong>Celular: </strong>{{$contacto['celular']}}</p>
</body>
</html>