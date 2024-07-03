<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePacienteRequest extends FormRequest
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
            'nombre' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'sexo' => 'required|string|max:10',
            'telefono_paciente' => 'required|string|max:20',
            'correo' => 'required|string|email|max:255|unique:pacientes',
            'nombre_contacto_emergencia' => 'required|string|max:255',
            'telefono_contacto_emergencia' => 'required|string|max:20',
            'id_medico' => 'required|string|max:20'
        ];
    }
}
