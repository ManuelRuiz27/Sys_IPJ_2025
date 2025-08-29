<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConferenciaNomadaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'tema_nomada_id' => ['required', 'exists:tema_nomadas,id'],
            'titulo' => ['required', 'string', 'max:255'],
            'fecha' => ['required', 'date'],
            'municipio' => ['required', 'string', 'max:255'],
            'descripcion' => ['nullable', 'string'],
        ];
    }
}
