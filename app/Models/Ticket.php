<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $table = 'tickets'; 

    // Los campos que pueden ser asignados masivamente
    protected $fillable = [
        'usuario_id',
        'ubicacion',
        'descripcion',
        'categoria',
    ];

    // Relación con el modelo Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
    
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
