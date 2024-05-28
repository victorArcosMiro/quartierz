<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedido'; // Nombre de la tabla en la base de datos

    public function custom()
    {
        return $this->hasOne(Custom::class); // Relación uno a cero con la tabla 'custom'
    }

    public function diseño()
    {
        return $this->hasOne(Design::class); // Relación uno a cero con la tabla 'diseño'
    }

    public function materiales()
    {
        return $this->belongsToMany(Material::class); // Relación muchos a muchos con la tabla 'material'
    }
    public function estado()
    {
        return $this->belongsTo(EstadoPedido::class, 'estado_pedido_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function detalles()
    {
        return $this->hasMany(PedidoDesignCantidad::class);
    }
}
