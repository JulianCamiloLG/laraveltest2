<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('plantilla')

    @section('titulo', 'Todos los mensajes')
        
    @section('contenido')
    <div class="container">
        <h3>Todos los mensajes</h3>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Asunto</th>
                    <th>Contenido</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($mensajes as $mensaje)
                    <tr>
                    @if ($mensaje->user_id)
		                <td>
			                <a href="{{ route('usuarios.show', $mensaje->user->id) }}">
				                {{ $mensaje->user->name}}
			                </a>
		                </td> 
		                <td>{{ $mensaje->user->email}}</td>
	                @else
                        <td>{{ $mensaje->nombre}}</td> {{-- ojo mensaje->nombre --}}
                        <td>{{ $mensaje->email}}</td>
                    @endif
	
                    <td>
                        <a href="{{ route('mensajes.show', $mensaje->id) }}">
                            {{ $mensaje->asunto }}
                        </a>
                    </td>
                    <button type="submit" class="btn btn-primary">
                        {{ $btnText ?? 'Guardar' }}
                    </button>
                                   
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection
</body>
</html>