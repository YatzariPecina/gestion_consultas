<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_paciente',
        'temperatura_actual',
        'presion_arterial',
        'diagnostico'
    ];

    public function compras()
    {
        return $this->hasMany(Compra::class);
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }
}
