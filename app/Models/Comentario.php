<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_destinatario',
        'id_remitente',
        'contenido'
    ];

    public function notificacion()
    {
        return $this->hasOne(Notificacion::class);
    }
}
