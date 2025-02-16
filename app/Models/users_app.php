<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users_app extends Model
{
    protected $table = 'users_app'; // Especificar el nombre correcto de la tabla
    protected $fillable = ['name', 'lastname', 'dni', 'email', 'username', 'password', 'state'];
}

