<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'users'; // Si es 'users' y no 'usuarios'

    // Los campos que pueden ser asignados masivamente
    protected $fillable = [
        'nombre',
        'puesto',
    ];
}
