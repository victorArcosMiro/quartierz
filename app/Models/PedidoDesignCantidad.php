<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PedidoDesignCantidad extends Model
{
    protected $table = 'pedido_design_cantidad';

    // Aquí puedes definir relaciones con otros modelos, si es necesario
    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

    public function design()
    {
        return $this->belongsTo(Design::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
