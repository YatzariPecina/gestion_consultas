<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultaProducto extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_consulta',
        'id_producto',
        'cantidad'
    ];
}
