<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = 'factura'; // Nombre de la tabla en la base de datos

    public function pedido()
    {
        return $this->belongsTo(Pedido::class); // Relación uno a uno con la tabla 'pedido'
    }
}
