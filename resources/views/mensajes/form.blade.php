
@extends('plantilla')

@section('titulo', 'Contacto')
        
@section('contenido')
<form action="{{route('mensajes.store')}}" method="post"> 
    @if ($mostrarCampos) {{-- ver MensajesControler métodos create y edit --}}
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
        @endif
        <div class="form-group">
                <label for="asunto">Asunto</label>
                <input type="input" class="form-control" id="asunto" name="asunto" placeholder="Motivo por el que se comunica con nosotros">
            </div>
    
            <div class="form-group">
                <label for="contenido">Contenido</label>
                <textarea class="form-control" id="contenido" name="contenido" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">{{ $btnText ?? 'Guardar' }}</button>
    </form>
@endsection
</body>
</html>