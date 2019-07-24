<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" 
            content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Mensajes de contactos</title>
    </head>
    <body>
        <div class="container">
            <p>Recibiste un mensaje de:  
                {{ $mensaje['nombre'] }} - 
                {{ $mensaje['correo'] }}
                </p>
                <p><strong>Asunto:</strong> {{ $mensaje['asunto'] }} </p>
                <p><strong>Contenido:</strong> {{ $mensaje['contenido'] }} </p>
        </div>        
    </body>
     
</html>