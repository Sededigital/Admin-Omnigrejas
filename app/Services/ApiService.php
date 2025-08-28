<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ApiService
{
   protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('services.omnigreja_api.base_url');
    }

    public function login($email, $password)
    {
        return Http::post("{$this->baseUrl}/api/v1/auth/login", [
            'email' => $email,
            'password' => $password,
        ]);
    }

    public function getUsers()
    {
        return Http::withToken(session('api_token'))
            ->get("{$this->baseUrl}/api/v1/users");
    }
}
