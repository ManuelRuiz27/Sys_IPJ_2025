<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GrupoManejoRequest extends FormRequest
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
            'periodo_id' => ['required', 'exists:periodos_manejo,id'],
            'horario' => ['required', 'string'],
            'cupo_total' => ['required', 'integer', 'min:1'],
        ];
    }
}
