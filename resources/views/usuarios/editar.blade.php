@extends('plantilla')

@section('titulo', 'Editar usuario')

@section('contenido')
    <h3>Editar usuarios</h3>
  
    @if (session()->has('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif

    <form method="post" action={{ route('usuarios.update', $usuario->id) }}>
        {!! method_field('PUT') !!}
        @include('usuarios.form', ['usuario' => new App\User])
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>	

@endsection