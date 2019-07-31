@extends('plantilla')

@section('titulo', 'Todos los usuarios')

@section('contenido')
<body>
       <h3>Hay un nuevo mensaje por revisar:</h3>
       <p>Cuenta: {{ $msg['nombre'] }} - {{ $msg['email'] }}</p>
       <p><strong>Asunto:</strong> {{ $msg['asunto'] }} </p>
       <p><strong>Contenido:</strong> {{ $msg['contenido'] }} </p>
       <hr>
       Gracias por verificar su contenido.
   </body>
</html>
@endsection