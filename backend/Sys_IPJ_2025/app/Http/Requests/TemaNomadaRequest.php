<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TemaNomadaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => [
                'required',
                'string',
                Rule::unique('tema_nomadas')->ignore($this->route('tema_nomada')),
            ],
            'descripcion' => ['nullable', 'string'],
        ];
    }
}
