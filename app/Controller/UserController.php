<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\User;
use App\Request\UserDraftRequest;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Psr\Http\Message\ResponseInterface as PsrResponseInterface;

class UserController
{
    public function draft(UserDraftRequest $request, ResponseInterface $response): PsrResponseInterface
    {
        $data = $request->validated();

        $user = User::create([
            'name' => $data['nome'],
            'cpf' => $data['cpf'],
            'email' => $data['email'],
            'phone' => $data['telefone'],
            'status' => User::STATUS_DRAFT,
        ]);

        return $response->json([
            'id' => $user->id,
            'status' => $user->status,
        ])->withStatus(201);
    }
}
