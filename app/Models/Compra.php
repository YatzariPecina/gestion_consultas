<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Compra extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_consulta',
        'tipoPago',
        'total',
        'pagada'
    ];

    public function consulta()
    {
        return $this->belongsTo(Consulta::class)->withDefault();
    }

    public function elementos(): MorphMany
    {
        return $this->morphMany(ElementosComprados::class, 'elemento');
    }
}
