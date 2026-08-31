<?php

declare(strict_types=1);

namespace App\Model;

use Hyperf\DbConnection\Model\Model;

class User extends Model
{
    public const STATUS_DRAFT = 'DRAFT';
    public const STATUS_ACTIVE = 'ACTIVE';
    public const STATUS_BLOCKED = 'BLOCKED';

    protected ?string $table = 'users';

    protected array $fillable = [
        'name',
        'email',
        'cpf',
        'phone',
        'status',
    ];

    protected array $casts = [
        'id' => 'integer',
    ];
}