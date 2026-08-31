<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\User;
use App\Request\User\RegisterAddressRequest;
use App\Request\User\UserDraftRequest;
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

    public function registerAddress(RegisterAddressRequest $request, ResponseInterface $response): PsrResponseInterface{
        $data = $request->validated();
        $user = User::find($request->route('id'));

        $user->city = $data['cidade'];
        $user->state = $data['uf'];
        $user->postal_code = $data['cep'];
        $user->street = $data['logradouro'];
        $user->save();

        return $response->json([
            'id' => $user->id,
            'city' => $user->city
        ])->withStatus(201);
    }
}
