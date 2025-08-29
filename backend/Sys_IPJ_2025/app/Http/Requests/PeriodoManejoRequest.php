<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PeriodoManejoRequest extends FormRequest
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
            'anio' => ['required', 'integer', 'min:2000'],
            'mes' => [
                'required',
                'integer',
                'between:1,12',
                Rule::unique('periodos_manejo')->where(fn($q) => $q->where('anio', $this->input('anio')))->ignore($this->route('periodo_manejo')),
            ],
        ];
    }
}
