<?php

namespace Illuminate\Foundation\Http\Middleware;

/**
 * Alias of VerifyCsrfToken for consistency.
 */
class ValidateCsrfToken extends VerifyCsrfToken
{
    protected $except = [
        'receive-data', // Agrega esta línea
    ];
}
