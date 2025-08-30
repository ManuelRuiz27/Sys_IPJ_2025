<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BecaRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'periodo_escolar_id' => ['required', 'exists:periodos_escolares,id'],
            'beneficiario_id' => ['required', 'exists:beneficiarios,id'],
            'porcentaje' => ['required', 'integer', 'min:0', 'max:100'],
        ];
    }
}
