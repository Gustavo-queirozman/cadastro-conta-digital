<?php

declare(strict_types=1);

namespace App\Request\User;

use Hyperf\Validation\Request\FormRequest;

class RegisterAddressRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'cidade' => ['required', 'string', 'max:255'],
            'uf' => ['required', 'string', 'size:2'],
            'cep' => ['required', 'string', 'regex:/^\d{5}-\d{3}$/'],
            'logradouro' => ['required', 'string', 'max:255']
        ];
    }

    public function messages(): array{
        return [
            'cidade.required' => 'O campo Cidade é obrigatório.',
            'uf.required' => 'O campo UF é obrigatório',
            'uf.size' => 'O campo UF deve ter 2 caracteres.',
            'cep.required' => 'O campo CEP é obrigatório.',
        ];
    }
}
