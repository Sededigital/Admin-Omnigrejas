<?php

namespace App\Services\Api\V1;

class AuthService extends BaseService
{
     public function login(string $email, string $password)
    {
        return $this->client()->post('/auth/login', [
            'email' => $email,
            'password' => $password,
        ])->json(); // retorna array associativo
    }

    public function logout(string $token)
    {
        return $this->client()
            ->withToken($token)
            ->post('/auth/logout')
            ->json();
    }


    public function refresh()
    {
        return $this->client()->post('/auth/refresh');
    }
}
