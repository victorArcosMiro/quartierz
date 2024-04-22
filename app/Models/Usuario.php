<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario'; // Nombre de la tabla en la base de datos

    public function cliente()
    {
        return $this->belongsTo(Cliente::class); // Relación uno a uno inversa con la tabla 'cliente'
    }
}

