<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class ElementosComprados extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_compra',
        'id_producto',
        'tipo',
        'cantidad'
    ];

    public function compra()
    {
        return $this->belongsTo(Compra::class);
    }

    public function elemento(): MorphTo
    {
        return $this->morphTo();
    }
}
