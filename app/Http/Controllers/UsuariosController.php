<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\CreateUserRequest;/////////////////////////////

class UsuariosController extends Controller {

    function __construct() { //
        $this->middleware('auth', ['except' => ['show']]);
        // la siguiente excepción hace que edit de usuarios pueda ser accesible para cualquier ID desde la barra de direcciones
        $this->middleware('roles:Administrador', ['except' => ['destroy', 'edit', 'update', 'show']]);
    }

    /**
     * Desplegar una lista del recurso (una lista de usuarios).
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $usuarios = User::with(['roles', 'nota', 'etiquetas'])->get();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $roles = Role::pluck('nombre', 'id');
        return view('usuarios.crear', compact('roles'));
    }

    /**
     * Guardar un recurso (usuario) recién creado
     *
     * @param  App\Http\Requests\CreateUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request) {///////////////////////////////////////////
        // dd($request->all()); // <-- descomente para verificar datos del nuevo usuario
        $user = User::create($request->all());
        $user->roles()->attach($request->roles);
		return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) { 
        $usuario = User::findOrFail($id);
        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Mostrar el formulario para editar un recurso (usuario) específico
     *
     * @param  int  $id El id del usuario a editar
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $usuario = User::findOrFail($id); // se importó la clase para poder usar
        $this->authorize($usuario);
        $roles = Role::pluck('nombre', 'id');
        // dd($roles); // <-- descomente si desea ver cómo llegan los datos a vista
        return view('usuarios.editar', compact('usuario', 'roles'));
    }

    /**
     * Actualizar el recurso especificado en la tabla "user"
     *
     *
     * @param  App\Http\Requests\UpdateUserRequest  $request
     * @param  int  $id El id del usuario a actualizar
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id) {
        // dd($request->all()); // <-- descomente para ver datos recibidos
        $usuario = User::findOrFail($id);
        $this->authorize($usuario); 
        $usuario->update($request->except('password'));  // $request->all() | $request->only | $request->except
        $usuario->roles()->sync($request->roles); // cuidado attach duplica
        return back()->with('info', 'Usuario actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $usuario = User::findOrFail($id);
        // $this->authorize($usuario);  
        // <-- quité lo anterior porque intentaría autorizar al usuario actual y lo que quiero
        // es que cumpla con las políticas definidas en ..\app\Policies\UserPolicy.php
        $usuario->roles()->detach(); // <-- Esto no sería necesario con eliminación en cascada
        $usuario->delete();
        return back();
    }
}