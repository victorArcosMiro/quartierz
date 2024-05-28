<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidosPorTelefono extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellidos',
        'telefono',
        'cita',
        'estado_pedido_id',
        'precio_total',
    ];

    protected $table = 'pedidos_por_telefono'; // Nombre de la tabla en la base de datos

    public function estado()
    {
        return $this->belongsTo(EstadoPedido::class); // Relación muchos a uno con la tabla 'estados_pedido'
    }

}
