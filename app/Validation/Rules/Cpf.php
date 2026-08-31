<?php

declare(strict_types=1);

namespace App\Validation\Rules;

use Hyperf\Validation\Contract\Rule;

class Cpf implements Rule
{
    public function passes(string $attribute, mixed $value): bool
    {
        if (! is_scalar($value)) {
            return false;
        }

        $cpf = preg_replace('/\D/', '', (string) $value);

        if (strlen($cpf) !== 11 || $cpf === str_repeat($cpf[0], 11)) {
            return false;
        }

        for ($position = 9; $position < 11; ++$position) {
            $sum = 0;

            for ($index = 0; $index < $position; ++$index) {
                $sum += (int) $cpf[$index] * ($position + 1 - $index);
            }

            $digit = ($sum * 10) % 11;
            $digit = $digit === 10 ? 0 : $digit;

            if ((int) $cpf[$position] !== $digit) {
                return false;
            }
        }

        return true;
    }

    public function message(): string
    {
        return 'O campo CPF deve ser um CPF válido.';
    }
}
