<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function up() {
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre')->unique();
            $table->string('descripcion')->nullable();
            $table->timestamps();
        });
    }


    public function user() {
       return $this->hasOne(User::class);
       //return $this->hasMany(User::class);
   }

}
