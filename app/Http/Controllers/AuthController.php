<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Handlers\AuthHandler;
use Illuminate\Http\Request;
use Throwable;

class AuthController extends Controller
{
    protected AuthHandler $authHandler;

    public function __construct(AuthHandler $authHandler)
    {
        $this->authHandler = $authHandler;
    }

    public function register(RegisterRequest $request)
    {
        try {
            $data = $this->authHandler->register($request->validated());

            return created($data, 'Registrasi berhasil');

        } catch (Throwable $e) {
            return serverError('Gagal melakukan registrasi', $e->getMessage());
        }
    }


    public function login(LoginRequest $request)
    {
        try {
            $data = $this->authHandler->login($request->validated());

            return ok($data, 'Login berhasil');

        } catch (Throwable $e) {
            return serverError('Cek dan coba lagi', $e->getMessage());
        }
    }

}