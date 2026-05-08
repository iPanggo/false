<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RakyatSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Rakyat',
            'email' => 'Rakyat@example.com',
            'password' => Hash::make('rakyatrakyat'),
            'role' => 'rakyat',
        ]);
    }
}
