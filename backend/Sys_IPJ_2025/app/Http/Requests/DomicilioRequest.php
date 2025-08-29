<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DomicilioRequest extends FormRequest
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
            'calle' => ['required', 'string'],
            'numero' => ['nullable', 'string'],
            'colonia' => ['nullable', 'string'],
            'cp' => ['nullable', 'string', 'max:10'],
        ];
    }
}
