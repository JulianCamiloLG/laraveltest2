@extends('plantilla')

@section('titulo', 'Usuario')

@section('contenido')
  <h3>Editar usuarios</h3>
  
    @if (session()->has('info'))
       <div class="alert alert-success">{{ session('info') }}</div>
    @endif

    <form method="post" action={{ route('usuarios.update', $usuario->id) }}>
        @csrf
        {!! method_field('PUT') !!}

        <input name="name" placeholder="Nombre..." value="{{ $usuario->name }}"><br>
		{!! $errors->first('name', '<small>:message</small>') !!} <br>
		
		<input type="email" name="email" placeholder="Correo..." value="{{ $usuario->email }}"><br>
		{!! $errors->first('email', '<small>:message</small>') !!} <br>

        <input name="address" placeholder="Dirección..." value="{{ $usuario->address }}"><br>
		{!! $errors->first('address', '<small>:message</small>') !!} <br>

        <input name="phone" placeholder="Teléfono..." value="{{ $usuario->phone }}"><br>
		{!! $errors->first('phone', '<small>:message</small>') !!} <br>

        <button>Enviar</button>
    </form> 

@endsection