<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_destinatario',
        'id_comentario',
        'contenido'
    ];

    public function comentario()
    {
        return $this->belongsTo(Comentario::class);
    }
}
