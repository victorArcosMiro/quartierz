<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    protected $table = 'design'; // Nombre de la tabla en la base de datos

    public function pedido()
    {
        return $this->belongsTo(Pedido::class); // Relación uno a cero con la tabla 'pedido'
    }
    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
