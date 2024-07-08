<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'precio',
        'id_tipo_servicio'
    ];

    public function tipoServicio()
    {
        return $this->belongsTo(Tipo_servicio::class, 'id_tipo_servicio');
    }
}
