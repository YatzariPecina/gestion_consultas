<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreMedicoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
            'telefono' => 'required|string|max:15',
            'profesion' => 'required|string|max:250',
            'tipo_medico' => 'required|string|max:250'
        ];
    }

    public function prepareForValidation()
    {
        // Asignar el valor de 'rol' a 'Medico'
        $this->merge(['rol' => 'Medico']);

        parent::prepareForValidation();
    }
}
