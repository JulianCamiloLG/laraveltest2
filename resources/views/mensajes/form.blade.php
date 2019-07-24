<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fomr</title>
</head>
<body>
        @extends('plantilla')

        @section('titulo', 'Contacto')
        
        @section('contenido')
<form action="{{route('mensajes.store')}}" method="post"> 
        @unless ($mensaje->user_id) {{-- si no tiene user_id…  --}}
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="input" class="form-control" 
                    id="nombre" name="nombre" 
                    placeholder="Ingrese aquí su nombre" 
                    value="{{ $mensaje->nombre ?? old('nombre') }}"
            >
        </div>

        <div class="form-group">
            <label for="email">Correo</label>
            <input type="email" class="form-control" id="email" name="email"
                placeholder="Ingrese aquí su correo" 
                value="{{ $mensaje->email ?? old('email') }}"
            >
        </div>
        @endunless
        <div class="form-group">
                <label for="asunto">Asunto</label>
                <input type="input" class="form-control" id="asunto" name="asunto" placeholder="Motivo por el que se comunica con nosotros">
            </div>
    
            <div class="form-group">
                <label for="contenido">Contenido</label>
                <textarea class="form-control" id="contenido" name="contenido" rows="3"></textarea>
            </div>
    </form>
@endsection
</body>
</html>