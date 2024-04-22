<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente'; // Nombre de la tabla en la base de datos

    public function pedidos()
    {
        return $this->hasMany(Pedido::class); // Relación uno a muchos con la tabla 'pedido'
    }

    public function usuario()
    {
        return $this->hasOne(Usuario::class); // Relación uno a uno con la tabla 'usuario'
    }
}
