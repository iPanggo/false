<?php
namespace App\Repositories;

use App\Interfaces\AuthInterface;
use App\Models\User;

class AuthRepository implements AuthInterface
{
        public function findBynisn_nip(string $data)
    {
        return User::where('email', $data)->firstOrFail();
    }
            public function create(array $data)
    {
        return User::create($data);
    }
}