<?php

declare(strict_types=1);

namespace App\Request;

use App\Validation\Rules\Cpf;
use Hyperf\Validation\Request\FormRequest;

class UserDraftRequest extends FormRequest
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
            'nome' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'string', new Cpf(), 'unique:users,cpf'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'telefone' => ['required', 'string', 'regex:/^\(?\d{2}\)?\s?9\d{4}-?\d{4}$/']
        ];
    }

    public function messages(): array
    {
        return [
            'cpf.required' => 'O campo CPF é obrigatório.',
            'cpf.cpf' => 'O campo CPF deve ser um CPF válido.',
            'cpf.unique' => 'O CPF informado já está cadastrado.',
            'email.required' => 'O campo E-mail é obrigatório.',
            'email.email' => 'E-mail inválido.',
            'email.unique' => 'E-mail já cadastrado.',
            'telefone.required' => 'O campo Telefone é obrigatório.',
            'telefone.regex' => 'Telefone celular inválido. O formato deve ser (XX) 9XXXX-XXXX.',
            'nome.required' => 'O campo Nome é obrigatório.',
            'nome.string' => 'O campo Nome deve ser uma string.',
            'nome.max' => 'O campo Nome deve ter no máximo 255 caracteres.'

        ];
    }
}
