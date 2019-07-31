@extends('plantilla')

@section('titulo', 'Todos los usuarios')

@section('contenido')
    <br>
    <h3>Todos los usuarios</h3>
    <a class="btn btn-primary btn-sm float-right" 
      href="{{ route('usuarios.create') }}"
    >Crear nuevo usuario</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Tipo</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Notas</th>
                <th>Etiquetas</th>
                <th>Acciones</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->name}}</td>
                    <td>{{ $usuario->email}}</td>
                    <td>
                    
                        {{ $usuario->roles->pluck('nombre')->implode(' - ') }}
                        
                        
                    </td>
                    <td>{{ $usuario->address}}</td>
                    <td>{{ $usuario->phone}}</td>
                    <td>{{ $usuario->nota->contenido ?? '' }}</td>
                    <td>{{ $usuario->etiquetas->pluck('nombre')->implode(', ') }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <div class="col-md-6 custom">
                                <a class="btn btn-info btn-sm" href="{{ route('usuarios.edit', $usuario->id) }}">Editar</a>    
                            </div>

                            <div class="col-md-6 custom">
                                <form method="POST" action="{{ route('usuarios.destroy', $usuario->id) }}">
                                    @csrf
                                    {!! method_field('DELETE') !!}
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </div>
            
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection