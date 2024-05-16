<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoPedido extends Model
{
    use HasFactory;

    protected $table = 'estados_pedido'; // Nombre de la tabla en la base de datos

    public function pedidos()
    {
        return $this->hasMany(Pedido::class); // Relación uno a muchos con la tabla 'pedido'
    }

    public function pedidosPorTelefono()
    {
        return $this->hasMany(PedidosPorTelefono::class); // Relación uno a muchos con la tabla 'pedidos_por_telefono'
    }

}
