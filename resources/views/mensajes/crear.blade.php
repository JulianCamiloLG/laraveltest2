  @extends('plantilla')

    @section('titulo', 'Contacto')
    
    @section('contenido')
    <div class="container">
        <h1>Contacto</h1>

        <form method="post" action={{ route('mensajes.store') }}>
           @include('mensajes.form',['mensaje' => new App\Mensaje])
        </form>

    </div>
        
    
    @endsection
