<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstudioPaciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_compra',
        'id_estudio',
        'fecha_estudio',
        'hora_estudio'
    ];
}
