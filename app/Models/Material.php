<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'material'; // Nombre de la tabla en la base de datos

    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class); // Relación muchos a muchos con la tabla 'pedido'
    }
    public function designs()
    {
        return $this->hasMany(Design::class); // Relación uno a muchos con la tabla 'design'
    }

}
