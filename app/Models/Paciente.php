<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'fecha_nacimiento',
        'sexo',
        'telefono_paciente',
        'correo',
        'direccion',
        'nacionalidad',
        'nombre_contacto_emergencia',
        'telefono_contacto_emergencia',
        'RFC',
        'observaciones',
        'id_medico'
    ];

    public function medico()
    {
        return $this->belongsTo(Medico::class, 'id_medico');
    }
}
