<?php

namespace App\Handlers;

use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthHandler
{
    protected AuthRepository $authRepo;

    public function __construct(AuthRepository $authRepo)
    {
        $this->authRepo = $authRepo;
    }

public function register(array $data): User
{
    return $this->authRepo->create($data);
}

public function login(array $data)
{
    $user = $this->authRepo->findBynisn_nip($data['email']);

    if (!$user) {
        throw new \Exception('User tidak ditemukan');
    }

    return [
        'token' => $user->createToken('api_token')->plainTextToken,
        'user' => $user
    ];
}
}