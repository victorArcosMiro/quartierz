<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDiasVetados extends Model
{
    use HasFactory;

    protected $table = 'tipo_dias_vetados'; // Nombre de la tabla en la base de datos

    public function diasVetados()
    {
        return $this->hasMany(DiasVetados::class); // Relación uno a muchos con la tabla 'dias_vetados'
    }
}
