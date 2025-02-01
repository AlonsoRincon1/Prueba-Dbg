<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $table = 'tickets'; 

    protected $fillable = [
        'usuario_id',
        'ubicacion',
        'descripcion',
        'categoria',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
    
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
