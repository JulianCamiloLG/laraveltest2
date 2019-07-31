<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'address', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function hasRoles(array $roles) {
        return $this->roles->pluck('nombre')->intersect($roles)->count();
    }
    
    public function roles() {
        return $this->belongsToMany(Role::class);
    } 

    public function isAdmin() {
        return $this->hasRoles(['Administrador']);
    }

    public function setPasswordAttribute($password) {
        $this->attributes['password'] = bcrypt($password);
    }

    public function nota() { // <-- un nombre cualquiera
        // se puede usar morphOne/morphMany
        return $this->morphOne(Nota::class, 'anotacion'); // param2 = llave o prefijo, ver migración: $table->integer('anotacion_id')->unsigned();
    }
    public function etiquetas() {
		return $this->morphToMany(Etiqueta::class, 'etiquetable')->withTimestamps(); // <-- forzar registrar created_at y updated_at
	}
}
