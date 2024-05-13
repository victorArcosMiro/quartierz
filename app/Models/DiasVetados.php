<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiasVetados extends Model
{
    use HasFactory;

    protected $table = 'dias_vetados'; // Nombre de la tabla en la base de datos

    public function tipoDiaVetado()
    {
        return $this->belongsTo(TipoDiasVetados::class); // Relación uno a uno inversa con la tabla 'tipo_dias_vetados'
    }
}
